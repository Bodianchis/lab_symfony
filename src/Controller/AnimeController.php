<?php

namespace App\Controller;

use App\Entity\Anime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function catalog(EntityManagerInterface $entityManager): Response
    {
        // Отримуємо всі аніме з бази даних через репозиторій
        $animes = $entityManager->getRepository(Anime::class)->findAll();

        return $this->render('anime/catalog.html.twig', [
            'animes' => $animes,
        ]);
    }
}