<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TrackOrderController extends AbstractController
{
    #[Route('/track-order', name: 'track_order', methods: ['GET'])]
    public function index(Request $request, HttpClientInterface $client): Response
    {

        $orderId = $request->query->get('id');

        // ask notifier service to send notifications
        $client->request('POST', $this->getParameter('app.notifier_service'), [
            'json' => ['id' => $orderId] 
        ]);

        return $this->render('tracker/index.html.twig', [
            'id' => $orderId,
        ]);
    }
}
