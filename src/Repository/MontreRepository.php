<?php

namespace App\Repository;

use App\Entity\Montre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Montre>
 *
 * @method Montre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Montre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Montre[]    findAll()
 * @method Montre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MontreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Montre::class);
    }

    //    /**
    //     * @return Montre[] Returns an array of Montre objects
    //     */
    public function findByFilters($Categories = null, $Materiaux = null)
    {
        $qb = $this->createQueryBuilder('m');

        if ($Categories) {
            $CategoriesIds = [];
            foreach ($Categories as $category) {
                $CategoriesIds[] = $category->getId();
            }
            $qb->innerJoin('m.Categories', 'c')
                ->andWhere('c.id IN (:Categories)')
                ->setParameter('Categories', $CategoriesIds);
        }

        if ($Materiaux) {
            $MateriauxIds = [];
            foreach ($Materiaux as $materiau) {
                $MateriauxIds[] = $materiau->getId();
            }
            $qb->innerJoin('m.Materiaux', 'mat')
                ->andWhere('mat.id IN (:Materiaux)')
                ->setParameter('Materiaux', $MateriauxIds);
        }
        dump($Categories, $Materiaux);

        return $qb->getQuery()->getResult();
    }








    // public function findOneBySomeField($value): ?Montre
    // {
    //     return $this->createQueryBuilder('m')
    //         ->andWhere('m.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult();
    // }
}
