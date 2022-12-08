<?php

namespace App\Repository;

use App\Entity\Heurejoingabilites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Heurejoingabilites>
 *
 * @method Heurejoingabilites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Heurejoingabilites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Heurejoingabilites[]    findAll()
 * @method Heurejoingabilites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeurejoingabilitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Heurejoingabilites::class);
    }

    public function save(Heurejoingabilites $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Heurejoingabilites $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Heurejoingabilites[] Returns an array of Heurejoingabilites objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Heurejoingabilites
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
