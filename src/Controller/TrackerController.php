<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrackerController extends AbstractController
{
    #[Route('/order-track', name: 'order_track')]
    public function index(Request $request): Response
    {

        $orderId = $request->query->get('id');

        return $this->render('tracker/index.html.twig', [
            'id' => $orderId,
        ]);
    }
}
