<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Entity\Pizza;
use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceOrderController extends AbstractController
{

    #[Route('/place-order', name: 'order_list_pizzas', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {

        $pizzas = $doctrine->getRepository(Pizza::class)->findAll();

        return $this->render('place_order/index.html.twig', [
            'pizzas' => $pizzas
        ]);
    }

    #[Route('/place-order', name: 'place_order', methods: ['POST'])]
    public function placeOrder(Request $request, ManagerRegistry $doctrine): Response 
    {
        $data = $request->toArray();
        $order = new Order();

        $entityManager = $doctrine->getManager();
        $entityManager->persist($order);
        
        $order->setClient($doctrine->getRepository(Client::class)->find('0123568920'));
        $order->setOrderedAt(new DateTimeImmutable($data['orderedAt']));
        $order->setTotalPrice($data['totalPrice']);
        
        foreach($data['pizzas'] as $pizza)
        {
            $orderDetails = new OrderDetails();
            $entityManager->persist($orderDetails);

            $orderDetails->setOrderId($order);
            $orderDetails->setPizza($doctrine->getRepository(Pizza::class)->find($pizza['id']));
            $orderDetails->setCount($pizza['count']);
        }

        $entityManager->flush();
        
        return new Response();
    }
}
