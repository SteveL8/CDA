<?php

namespace App\Controller;

use App\Entity\Rubrique;
use App\Entity\SousRubrique;
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

    #[Route('/rubrique/{id}/sous_rubriques', name: 'app_rubrique_sous')]
    public function showSousRubriques(int $id, EntityManagerInterface $entityManager): Response
    {
        // Récupérer les sous-rubriques directement via une requête DQL
        $sousRubriques = $entityManager->getRepository(SousRubrique::class)
            ->findBy(['rubrique' => $id]);
    
        if (!$sousRubriques) {
            throw $this->createNotFoundException('Aucune sous-rubrique trouvée pour cette rubrique.');
        }
    
        // Transmet les sous-rubriques au template
        return $this->render('principal/sous_rubriques.html.twig', [
            'sousRubriques' => $sousRubriques,
        ]);
    }

}
