<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController
{
    /**
     * @Route("/users", name="user")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findAll();
        
        $data = array();

        foreach ($user as $key => $users) {
            $data[$key]['name'] = $users->getName();
            $data[$key]['day'] = $users->getDay();
            $data[$key]['project'] = $users->getProject();
        }

        return new JsonResponse($data);

    }
}