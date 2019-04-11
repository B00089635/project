<?php

namespace App\Repository;

use App\Entity\ProposedReferendum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProposedReferendum|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProposedReferendum|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProposedReferendum[]    findAll()
 * @method ProposedReferendum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProposedReferendumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProposedReferendum::class);
    }

    // /**
    //  * @return ProposedReferendum[] Returns an array of ProposedReferendum objects
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
    public function findOneBySomeField($value): ?ProposedReferendum
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
