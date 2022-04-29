<?php

namespace App\Repository;

use App\Entity\TertiaryGene;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TertiaryGene|null find($id, $lockMode = null, $lockVersion = null)
 * @method TertiaryGene|null findOneBy(array $criteria, array $orderBy = null)
 * @method TertiaryGene[]    findAll()
 * @method TertiaryGene[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TertiaryGeneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TertiaryGene::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TertiaryGene $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TertiaryGene $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return TertiaryGene[] Returns an array of TertiaryGene objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TertiaryGene
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
