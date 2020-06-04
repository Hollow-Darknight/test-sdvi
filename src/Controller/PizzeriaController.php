<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Repository\PizzeriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PizzeriaController
 * @package App\Controller
 */
class PizzeriaController extends AbstractController
{
    /**
     * @Route("/pizzerias")
     *
     * @param PizzeriaRepository $pizzeriaRepo
     *
     * @return Response
     */
    public function listeAction(PizzeriaRepository $pizzeriaRepo): Response
    {
        // récupération des différentes pizzéria de l'application
        $pizzerias = $pizzeriaRepo->findAll();

        return $this->render("Pizzeria/liste.html.twig", [
            "pizzerias" => $pizzerias,
        ]);
    }

    /**
     * @param PizzeriaRepository $pizzeriaRepo
     * @param int $pizzeriaId
     * @return Response
     * @Route(
     *     "/pizzerias/carte-{pizzeriaId}",
     *     requirements={"pizzeriaId": "\d+"}
     * )
     * @throws \Exception
     */
    public function detailAction(PizzeriaRepository $pizzeriaRepo, int $pizzeriaId): Response
    {
        $pizzeria = $pizzeriaRepo->findCartePizzeria($pizzeriaId);

        return $this->render("Pizzeria/carte.html.twig", [
            "pizzeria" => $pizzeria
        ]);
    }
}
