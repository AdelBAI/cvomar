<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Experience;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $user = $this->entityManager->getRepository(User::class)->findOneById(1);
        $experiences = $this->entityManager->getRepository(Experience::class)->findAll();
        return $this->render('/omar.html.twig',[
            'user' => $user,
            'experiences' => $experiences,
        ]);
    }
}
