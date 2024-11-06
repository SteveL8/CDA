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
    public function showFirstRubrique(EntityManagerInterface $entityManager): Response
    {
        // Récupération de la première rubrique 
        $rubrique = $entityManager->getRepository(Rubrique::class)->findOneBy([]);

        // Vérification que la rubrique existe
        if (!$rubrique) {
            throw $this->createNotFoundException('La rubrique n\'existe pas');
        }

        // Envoie de la rubrique au template
        return $this->render('principal/index.html.twig', [
            'rubrique' => $rubrique,
        ]);
    }
}
