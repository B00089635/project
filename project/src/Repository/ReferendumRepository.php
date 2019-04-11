<?php

namespace App\Repository;

use App\Entity\Referendum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Referendum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referendum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referendum[]    findAll()
 * @method Referendum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferendumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Referendum::class);
    }

    // /**
    //  * @return Referendum[] Returns an array of Referendum objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Referendum
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
