<?php

namespace App\Controller;

use App\Entity\Rubrique;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PrincipalController extends AbstractController
{
    #[Route('/', name: 'app_principal')]
    public function showFirstRubrique(EntityManagerInterface $entityManager): Response
    {

        {
            // Récupération de la première rubrique (supposons que l'ID soit 1)
            $rubrique = $entityManager->getRepository(Rubrique::class)->find(1);
    
            // Vérification que la rubrique existe
            if (!$rubrique) {
                throw $this->createNotFoundException('La rubrique n\'existe pas');
            }
            
        return $this->render('principal/index.html.twig', [
            'rubrique' => $rubrique,
        ]);
    }
}

}

