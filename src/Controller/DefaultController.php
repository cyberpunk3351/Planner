<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Day;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class DefaultController extends AbstractController


{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        // $em = $this->getDoctrine()->getManager();
        // $menu = $em->getRepository(User::class)->findAll();


        return $this->render('index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $this->getDoctrine()->getManager()->getRepository(User::class)->findAll(),
            'day' => $this->getDoctrine()->getManager()->getRepository(Day::class)->findAll(),
        ]);

    }

}
