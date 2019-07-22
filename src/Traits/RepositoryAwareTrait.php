<?php
/**
 * Created by PhpStorm.
 * User: mazitovtr
 * Date: 24.05.19
 * Time: 11:42
 */

namespace App\Traits;

use App\Entity\PurchaseRequest;
use App\Entity\PurchaseRequestItem;
use App\Entity\User;
use App\Repository\PurchaseRequestItemRepository;
use App\Repository\PurchaseRequestRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;

trait RepositoryAwareTrait
{
    /**
     * @return Registry
     */
    abstract protected function getDoctrine();

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @return UserRepository
     */
    protected function getUserRepository()
    {
        return $this->getDoctrine()->getRepository(User::class);
    }

    /**
     * @return PurchaseRequestRepository
     */
    protected function getPurchaseRequestRepository()
    {
        return $this->getDoctrine()->getRepository(PurchaseRequest::class);
    }

    /**
     * @return PurchaseRequestItemRepository
     */
    protected function getPurchaseRequestItemRepository()
    {
        return $this->getDoctrine()->getRepository(PurchaseRequestItem::class);
    }
}