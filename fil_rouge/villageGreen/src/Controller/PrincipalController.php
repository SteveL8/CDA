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
    // Récupérer la rubrique avec ses sous-rubriques
    $rubrique = $entityManager->getRepository(Rubrique::class)->find($id);

    if (!$rubrique) {
        throw $this->createNotFoundException('Rubrique non trouvée');
    }

    // Forcer le chargement des sous-rubriques et les passer en tableau pour éviter le lazy loading
    $sousRubriques = $rubrique->getSousRubriques()->toArray(); // Cela garantit que la collection est initialisée

    // Vérifier si sous-rubriques est bien rempli
    if (empty($sousRubriques)) {
        $sousRubriques = null;
    }

    return $this->render('principal/sous_rubriques.html.twig', [
        'rubrique' => $rubrique,
        'sousRubriques' => $sousRubriques,  // Passer la collection initialisée
    ]);
}

    

}
