<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'signup')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();
        $user = new User();
        $entityManager->persist($user);
        $form = $this->createForm(SignupType::class, $user, [
            'method' => 'POST'
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword(
                $passwordHasher->hashPassword($user, $form->get('plainPassword')->getData())
            );
            $entityManager->flush();

            // redirect to /home
        }

        return $this->renderForm('signup/index.html.twig', [
            'form' => $form
        ]);
    }
}
