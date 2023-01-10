<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;


use App\Entity\Article;
use App\Repository\ArticleRepository;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'Articles',
            'articles' => $articles
        ]);
    }

    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title'=>'HOME PAGE',
            'age'=>'31'
            ]);
    }

    #[Route('/blog/{id}', name: 'blog_show')]
    public function show(Article $repo): Response
    {
        return $this->render('blog/show.html.twig', [
            'article'=>$repo
        ]);
    }
    
    #[Route('/article/new', name: 'add_article')]
    public function addArticle(ManagerRegistry $doctrine, Request $request): Response
    {
        $manager = $doctrine->getManager();
        //

        for ($i = 1; $i <= 5; $i++)
        {
            $repo = new Article();
            //
            $k = $i + 18;
            $repo->setTitle("Article $k")
                 ->setContent("Contenue de l'article $k ")
                 ->setImage("https://via.placeholder.com/350x150")
                 ->setCreateAt(new \DateTime());

            $manager->persist($repo);
            //
            $manager->flush();
        }
        //
        return $this->redirect('/blog');
    }
}
