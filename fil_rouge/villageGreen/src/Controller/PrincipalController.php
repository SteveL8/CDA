<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Contrôleur qui gère les différentes pages

class PrincipalController extends AbstractController
{

    // Cette méthode récupère toutes les rubriques et les affiche dans le template `index.html.twig`
    #[Route('/', name: 'app_principal')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer toutes les rubriques via le repository
        $rubriques = $entityManager->getRepository(Rubrique::class)->findAll();

        // Rend la vue avec la liste des rubriques(1)
        return $this->render('principal/index.html.twig', [
            'rubriques' => $rubriques,
        ]);
    }


    // Récupère toutes les sous-rubriques associées à une rubrique spécifique par son ID
    #[Route('/rubrique/{id}/sous_rubriques', name: 'app_rubrique_sous')]
    public function showSousRubriques(int $id, EntityManagerInterface $entityManager): Response
    {
        // Récupère les sous-rubriques associées à la rubrique via son ID
        $sousRubriques = $entityManager->getRepository(SousRubrique::class)
            ->findBy(['rubrique' => $id]);

        // Exception lévée si aucune sous-rubriques n'est trouvée(2)
        if (!$sousRubriques) {
            throw $this->createNotFoundException('Aucune sous-rubrique trouvée pour cette rubrique.');
        }

        // (1)
        return $this->render('principal/sous_rubriques.html.twig', [
            'sousRubriques' => $sousRubriques,
        ]);
    }

    // Récupère tous les produits associées à une sous-rubrique 
    #[Route('/{id}/produit', name: 'app_produit')]
    public function showProduit(int $id, EntityManagerInterface $entityManager): Response
    {
        // Récupère tous les produits associés à la sous-rubrique via son ID
        $produits = $entityManager->getRepository(Produit::class)
            ->findBy(['sousRubrique' => $id]);

        // (2)
        if (empty($produits)) {
            throw $this->createNotFoundException('Aucun produit trouvé pour cette sous-rubrique.');
        }

        // (1)
        return $this->render('principal/produit.html.twig', [
            'produits' => $produits,
        ]);
    }

    // Récupère un produit par son ID et affiche ses informations détaillées
    #[Route('/produit/{id}', name: 'app_produit_detail')]
    public function showProduitDetail(int $id, EntityManagerInterface $entityManager): Response
    {
        // Récupère un produit spécifique via son ID
        $produit = $entityManager->getRepository(Produit::class)->find($id);

        // (2)
        if (!$produit) {
            throw $this->createNotFoundException('Produit introuvable.');
        }

        // (1)
        return $this->render('principal/produit_detail.html.twig', [
            'produit' => $produit,
        ]);
    }
}
