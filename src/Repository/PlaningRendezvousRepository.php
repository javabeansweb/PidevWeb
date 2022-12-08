<?php

namespace App\Repository;

use App\Entity\PlaningRendezvous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlaningRendezvous>
 *
 * @method PlaningRendezvous|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaningRendezvous|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaningRendezvous[]    findAll()
 * @method PlaningRendezvous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaningRendezvousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaningRendezvous::class);
    }

    public function save(PlaningRendezvous $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlaningRendezvous $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PlaningRendezvous[] Returns an array of PlaningRendezvous objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlaningRendezvous
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
