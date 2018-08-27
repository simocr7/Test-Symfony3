<?php

namespace vente\achatBundle\Repository;

class ProduitRepository extends \Doctrine\ORM\EntityRepository {

    public function findArray($array) {
        $qb = $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.id IN (:array)')
                ->orderBy('p.nom')
                ->setParameter('array', $array);
        return $qb->getQuery()->getResult();
    }

}
