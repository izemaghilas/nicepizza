<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{

    #[Route('/order', name: 'place_order', methods: ['GET'])]
    public function placeOrder(): Response
    {
        return $this->render('order/index.html.twig', [
            'pizzas' => []
        ]);
    }
}
