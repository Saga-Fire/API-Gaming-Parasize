<?php

namespace App\Repository;

use App\Entity\DeliveryOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeliveryOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliveryOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliveryOrder[]    findAll()
 * @method DeliveryOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeliveryOrder::class);
    }

    // /**
    //  * @return DeliveryOrder[] Returns an array of DeliveryOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeliveryOrder
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
