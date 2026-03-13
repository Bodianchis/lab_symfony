<?php

namespace App\DataFixtures;

use App\Entity\Anime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $animesData = [
            ['title' => 'Наруто', 'genre' => 'Сьонен', 'episodes' => 220],
            ['title' => 'Атака Титанів', 'genre' => 'Драма, Екшен', 'episodes' => 89],
            ['title' => 'Зошит Смерті', 'genre' => 'Детектив', 'episodes' => 37],
        ];

        foreach ($animesData as $data) {
            $anime = new Anime();
            $anime->setTitle($data['title']);
            $anime->setGenre($data['genre']);
            $anime->setEpisodes($data['episodes']);
            
            $manager->persist($anime);
        }

        $manager->flush();
    }
}