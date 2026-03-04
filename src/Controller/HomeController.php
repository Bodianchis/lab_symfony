<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends AbstractController
{
    #[Route('/feedback', name: 'feedback')]
    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('title', TextType::class, ['label' => 'Назва аніме'])
            ->add('message', TextareaType::class, ['label' => 'Ваш відгук / опис'])
            ->add('submit', SubmitType::class, ['label' => 'Відправити'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->addFlash('success', 'Дякуємо! Ваш відгук про "' . $data['title'] . '" збережено!');
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}