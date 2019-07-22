<?php
/**
 * Created by PhpStorm.
 * User: mazitovtr
 * Date: 27.05.19
 * Time: 15:00
 */

namespace App\Controller;

use App\Entity\PurchaseRequest;
use App\Entity\User;
use App\Traits\RepositoryAwareTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PurchaseRequestController extends Controller
{
    use RepositoryAwareTrait;

    /**
     * @Route("/purchases/{requestId}/details", name="request_details")
     */
    public function detailsAction(Request $request)
    {
        $requestId = $request->get('requestId');
        /** @var User $user */
        $user = $this->getUser();

        /** @var PurchaseRequest $purchaseRequest */
        $purchaseRequest = $this->getPurchaseRequestRepository()->find($requestId);

        $items = $this->getPurchaseRequestItemRepository()->findBy([
            'purchaseRequest' => $purchaseRequest->getId(),
            'supplier' => $user->getId()
        ]);

        return $this->render('purchase/details.html.twig', [
            'purchaseRequest' => $purchaseRequest,
            'items' => $items
        ]);
    }
}