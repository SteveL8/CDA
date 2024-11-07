<?php

namespace App\Controller;

use App\Entity\Rubrique;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    #[Route('/', name: 'app_principal')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer toutes les rubriques
        $rubriques = $entityManager->getRepository(Rubrique::class)->findAll();

        return $this->render('principal/index.html.twig', [
            'rubriques' => $rubriques,
        ]);
    }
}
