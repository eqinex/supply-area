<?php
/**
 * Created by PhpStorm.
 * User: mazitovtr
 * Date: 23.05.19
 * Time: 14:03
 */

namespace App\Controller;

use App\Entity\PurchaseRequest;
use App\Entity\PurchaseRequestItem;
use App\Entity\User;
use App\Traits\RepositoryAwareTrait;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends FOSRestController
{
    use RepositoryAwareTrait;

    /**
     * @Post("/api/purchases/add")
     */
    public function purchaseRequestAction(Request $request)
    {
        $contents = json_decode($request->getContent(), true);

        $purchaseRequest = $this->getPurchaseRequestRepository()->findOneBy(['olympRequest' => $contents['olympRequestId']]);

        if (!$purchaseRequest) {
            $purchaseRequest = new PurchaseRequest();

            $purchaseRequest
                ->setOlympRequest($contents['olympRequestId'])
                ->setCode($contents['code'])
                ->setType($contents['type'])
                ->setCreatedAt(new \DateTime(date('d.m.Y H:i')))
            ;

            $this->getEm()->persist($purchaseRequest);
        }

        foreach ($contents['items'] as $items) {
            /** @var User $user */
            $user = $this->getUserRepository()->findOneBy(['itnSupplier' => $items['supplierItn']]);

            if ($user) {

                $item = $this->getPurchaseRequestItemRepository()->findBy([
                    'supplier' => $user,
                    'olympItem' => $items['olympItemId']
                ]);

                if (!$item) {
                    $item = new PurchaseRequestItem();

                    $item
                        ->setPurchaseRequest($purchaseRequest)
                        ->setSupplier($user)
                        ->setTitle($items['title'])
                        ->setSku($items['sku'])
                        ->setQuantity($items['quantity'])
                        ->setOlympItem($items['olympItemId'])
                    ;

                    $this->getEm()->persist($item);
                }
            } else {
                continue;
            }
        }

        $this->getEm()->flush();

        return new Response($request->getContent());
    }
}