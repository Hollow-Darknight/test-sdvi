<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PizzaController
 * @package App\Controller
 */
class PizzaController extends AbstractController
{
    /**
     * @Route("/pizzas")
     *
     * @param PizzaRepository $pizzaRepo
     *
     * @return Response
     */
    public function listeAction(PizzaRepository $pizzaRepo): Response
    {
        // récupération des différentes pizzas
        $pizzas = $pizzaRepo->findAll();

        return $this->render("Pizza/liste.html.twig", [
            "pizzas" => $pizzas,
        ]);
    }

    /**
     * @Route(
     *     "/pizzas/detail-{pizzaId}",
     *     requirements={"pizzaId": "\d+"}
     * )
     *
     * @param PizzaRepository $pizzaRepo
     * @param int $pizzaId
     *
     * @return Response
     * @throws \Exception
     */
    public function detailAction(PizzaRepository $pizzaRepo, int $pizzaId): Response
    {
        $pizza = $pizzaRepo->findPizzaAvecDetailComplet($pizzaId);

        return $this->render("Pizza/detail.html.twig", [
            'pizza' => $pizza
        ]);
    }
}
