<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/page/home", name="page.home")
     */
    public function home()
    {
        return $this->render('page/home.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
