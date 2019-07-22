<?php

namespace App\Repository;

use App\Entity\PurchaseRequestItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PurchaseRequestItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method PurchaseRequestItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method PurchaseRequestItem[]    findAll()
 * @method PurchaseRequestItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PurchaseRequestItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PurchaseRequestItem::class);
    }

    // /**
    //  * @return PurchaseRequestItem[] Returns an array of PurchaseRequestItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PurchaseRequestItem
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
