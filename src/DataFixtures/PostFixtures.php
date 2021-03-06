<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post = new Post();

        $post->setTitle("Titre");
        $post->setContent("Contenu");
        $post->setCreatedAt(new DateTimeImmutable());

        $manager->persist($post);
        $manager->flush();
    }
}
