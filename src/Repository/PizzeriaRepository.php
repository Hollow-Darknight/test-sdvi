<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Entity\Pizzeria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class PizzeriaRepository
 * @package App\Repository
 */
class PizzeriaRepository extends ServiceEntityRepository
{
    /**
     * PizzeriaRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizzeria::class);
    }

    /**
     * @param int $pizzeriaId
     * @return Pizzeria
     */
    public function findCartePizzeria($pizzeriaId): Pizzeria
    {
        // Id verification
        if(!is_numeric($pizzeriaId) || $pizzeriaId <= 0){
            throw new \Exception("Impossible d'obtenir le menu de la Pizzeria ({$pizzeriaId}).");
        }

        // Query Builder creation, p is for pizzeria
        $qb = $this->createQueryBuilder("p");

        // Database request
        $qb->addSelect(["pizzas"])
            ->innerJoin("p.pizzas", "pizzas")
            ->orderBy("pizzas.nom", "ASC");

        // Execute request
        return $qb->getQuery()->getResult();
    }
}
