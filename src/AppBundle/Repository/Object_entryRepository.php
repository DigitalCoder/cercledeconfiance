<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;

/**
 * Object_entryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Object_entryRepository extends \Doctrine\ORM\EntityRepository
{
//    public function findByBrand(EntityManagerInterface $em){
//
//        $repository = $em->getRepository('AppBundle:Object_entry');
//
//        $query = $repository->createQueryBuilder('o')
//            ->innerJoin('o.circle_user', 'cu', Join::WITH, 'o.circle_user = cu.id')
//            ->innerJoin('cu.id', 'cui', Join::WITH, 'cu.id = cui.id')
//            ->where('o.circle_user = :cuid')
//            ->orderBy('o.id', 'DESC')
//            ->setParameter('cuid', '40')
//            ->getQuery();
//
//        $dql = 'SELECT o FROM AppBundle:Object_entry o INNER JOIN o.circle_user cu WITH o.circle_user=cu.id WHERE o.circle_user=40';
//
//        $result = $repository->createQueryBuilder($dql)->getQuery();
//        var_dump($query->getResult());die();
//        return $query->getResult();
//    }
}
