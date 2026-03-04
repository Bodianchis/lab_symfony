<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function catalog(): Response
    {
        // Тимчасові тестові дані для каталогу (поки немає бази даних)
        $animes = [
            ['title' => 'Наруто', 'genre' => 'Сьонен, Екшен', 'episodes' => 220, 'image' => 'https://via.placeholder.com/300x400?text=Naruto'],
            ['title' => 'Атака Титанів', 'genre' => 'Драма, Екшен', 'episodes' => 89, 'image' => 'https://via.placeholder.com/300x400?text=Attack+on+Titan'],
            ['title' => 'Зошит Смерті', 'genre' => 'Детектив, Трилер', 'episodes' => 37, 'image' => 'https://via.placeholder.com/300x400?text=Death+Note'],
        ];

        return $this->render('anime/catalog.html.twig', [
            'animes' => $animes,
        ]);
    }
}