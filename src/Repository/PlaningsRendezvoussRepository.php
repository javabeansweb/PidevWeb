<?php

namespace App\Repository;

use App\Entity\PlaningsRendezvouss;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlaningsRendezvouss>
 *
 * @method PlaningsRendezvouss|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaningsRendezvouss|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaningsRendezvouss[]    findAll()
 * @method PlaningsRendezvouss[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaningsRendezvoussRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaningsRendezvouss::class);
    }

    public function save(PlaningsRendezvouss $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlaningsRendezvouss $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PlaningsRendezvouss[] Returns an array of PlaningsRendezvouss objects
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

//    public function findOneBySomeField($value): ?PlaningsRendezvouss
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
