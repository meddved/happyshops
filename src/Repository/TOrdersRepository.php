<?php


namespace App\Repository;

use App\Entity\TOrders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class TOrdersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TOrders::class);
    }

    /**
     * @return QueryBuilder
     */
    public function createFindAllQuery() : QueryBuilder
    {
        return $this->_em->getRepository('App:TOrders')->createQueryBuilder('orders');
    }

    /**
     * @param array $filter
     *
     * @return QueryBuilder
     */
    public function createFindFilteredQuery(array $filter = []) : QueryBuilder
    {
        $queryBuilder = $this->createFindAllQuery();

        foreach ($filter as $fieldName => $condition) {
            $queryBuilder->andWhere("orders.$fieldName LIKE :condition")
                ->setParameter('condition', '%' . $condition . '%');
        }

        return $queryBuilder;
    }
}