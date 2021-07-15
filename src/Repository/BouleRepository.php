<?php

namespace App\Repository;

use App\Entity\Boule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Boule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boule[]    findAll()
 * @method Boule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boule::class);
    }

    // /**
    //  * @return Boule[] Returns an array of Boule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function find_tirage1()
    {
        return $this->createQueryBuilder('b')
            ->where('b.type = :type')
            ->setParameter('type','number')
            ->orderBy('RAND()')

            ->setMaxResults(5)
           // ->orderBy('RAND()')
            ->getQuery()
            ->getResult()
            ;
    }

    public function find_tirage2()
    {
        return $this->createQueryBuilder('b')
            ->where('b.type = :type')
            ->setParameter('type','special')
            ->orderBy('RAND()')
            ->setMaxResults(2)

            ->getQuery()

            ->getResult()
            ;
    }

    public function find_tirage()
    {
        $notification = $this->find_tirage1();
        $append = $this->find_tirage2();

        return array_merge($notification, $append);
    }


    /*
    public function findOneBySomeField($value): ?Boule
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
