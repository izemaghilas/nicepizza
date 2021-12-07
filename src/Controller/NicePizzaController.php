<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NicePizzaController extends AbstractController
{
    #[Route('/', name: 'nice_pizza_home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('nice_pizza/index.html.twig');
    }
}
