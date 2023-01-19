<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineLearningController extends AbstractController
{
    //#[Route('/doctrine/learning/deletion/article', name: 'deletion_article')]
    public function index(): Response
    {
        return $this->render('doctrine_learning/index.html.twig', [
            'controller_name' => 'DoctrineLearningController',
        ]);
    }
}
