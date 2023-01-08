<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use APP\Entity\Article;
class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1; $i<=10; $i++)
        {
            $article = new Article();
            $article->setTitle("Titre de l'article $i")
                    ->setContent("Contenu de l'article $i")
                    ->setImage("https://via.placeholder.com/350x150")
                    ->setCreateAt(new \DateTime());
            $manager->persist($article);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
