<?php

namespace App\DataFixtures;

use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Création de nouvelle catégorie(Rubrique ici)
        $r1 = new Rubrique();
        $r1->setNomRubrique("Instrument à cordes");
        $r1->setImage("img/r1.jpg");

        $manager->persist($r1);

        // Création de sous catégorie (SousRubrique)
        $sr1 = new SousRubrique();
        $sr1->setNomSousRubrique("Cordes frottées");
        $sr1->setImage("img\sr1.jpg");
        $sr1->setRubrique($r1); // Lie la sous rubrique(sr1) a une rubrique(r1)

        $manager->persist($sr1);

        // Création d'un nouveau Produit
        $p1 = new Produit();
        $p1->setLibelleCourt("Violon")
           ->setPrixAchat(600)
           ->setImage("img\p1.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Violon classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr1); // Lie le produit à la sous-rubrique "Corde frottées"

        $manager->persist($p1);

        $p2 = new Produit();
        $p2->setLibelleCourt("Violon alto")
           ->setPrixAchat(870)
           ->setImage("img\p2.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Violon alto")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr1);

        $manager->persist($p2);

        $p3 = new Produit();
        $p3->setLibelleCourt("Violoncelle")
           ->setPrixAchat(430)
           ->setImage("img\p3.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Violoncelle classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr1);

        $manager->persist($p3);

        $p4 = new Produit();
        $p4->setLibelleCourt("Contrebasse")
           ->setPrixAchat(1600)
           ->setImage("img\p4.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Contrebasse classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr1);

        $manager->persist($p4);

        //
        $sr2 = new SousRubrique();
        $sr2->setNomSousRubrique("Cordes pincées");
        $sr2->setImage("img\sr2.webp");
        $sr2->setRubrique($r1);

        $manager->persist($sr2);

        $p5 = new Produit();
        $p5->setLibelleCourt("Guitare")
           ->setPrixAchat(150)
           ->setImage("img\p5.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Guitare classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr2);

        $manager->persist($p5);

        $p6 = new Produit();
        $p6->setLibelleCourt("Harpe")
           ->setPrixAchat(6000)
           ->setImage("img\p6.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Harpe classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr2);

        $manager->persist($p6);

        $p7 = new Produit();
        $p7->setLibelleCourt("Clavecin")
           ->setPrixAchat(5000)
           ->setImage("img\p7.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Clavecin classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr2);

        $manager->persist($p7);

        //
        $sr3 = new SousRubrique();
        $sr3->setNomSousRubrique("Cordes frappées");
        $sr3->setImage("img\sr3.webp");
        $sr3->setRubrique($r1);

        $manager->persist($sr3);

        $p8 = new Produit();
        $p8->setLibelleCourt("Piano")
           ->setPrixAchat(2500)
           ->setImage("img\p8.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Piano classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr3);

        $manager->persist($p8);

        $p9 = new Produit();
        $p9->setLibelleCourt("Tympanon")
           ->setPrixAchat(10)
           ->setImage("img\p9.png")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Tympanon classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr2);

        $manager->persist($p9);

        // Création d'une nouvelle catégorie
        $r2 = new Rubrique();
        $r2->setNomRubrique("À percussion");
        $r2->setImage("img/r2.jpg");

        $manager->persist($r2);

        //
        $sr4 = new SousRubrique();
        $sr4->setNomSousRubrique("Les membranophones");
        $sr4->setImage("img\sr4.jpg");
        $sr4->setRubrique($r2);

        $manager->persist($sr4);

        $p10 = new Produit();
        $p10->setLibelleCourt("Tambours Indien")
           ->setPrixAchat(100)
           ->setImage("img\p10.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Tambours à chaudron classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr4);

        $manager->persist($p10);

        $p11 = new Produit();
        $p11->setLibelleCourt("Tambours tubulaires cylindriques")
           ->setPrixAchat(50)
           ->setImage("img\p11.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Tambours tubulaires cylindriques classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr4);

        $manager->persist($p11);

        $p12 = new Produit();
        $p12->setLibelleCourt("Tambours en forme")
           ->setPrixAchat(40)
           ->setImage("img\p12.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Tambours en forme classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr4);

        $manager->persist($p12);

        //
        $sr5 = new SousRubrique();
        $sr5->setNomSousRubrique("Idiophones");
        $sr5->setImage("img\sr5.jpg");
        $sr5->setRubrique($r2);

        $manager->persist($sr5);

        $p13 = new Produit();
        $p13->setLibelleCourt("Le triangle")
           ->setPrixAchat(7)
           ->setImage("img\p13.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le triangle classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr5);

        $manager->persist($p13);

        $p14 = new Produit();
        $p14->setLibelleCourt("Les castagnettes")
           ->setPrixAchat(30)
           ->setImage("img\p14.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Les castagnettes classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr5);

        $manager->persist($p14);

        $p15 = new Produit();
        $p15->setLibelleCourt("Les cloche")
           ->setPrixAchat(250)
           ->setImage("img\p15.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Les cloche classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr5);

        $manager->persist($p15);

        // Création d'une nouvelle catégorie
        $r3 = new Rubrique();
        $r3->setNomRubrique("Les cuivres");
        $r3->setImage("img/r3.jpeg");

        $manager->persist($r3);

        //
        $sr6 = new SousRubrique();
        $sr6->setNomSousRubrique("Les cuivres de petite taille");
        $sr6->setImage("img\sr6.jpg");
        $sr6->setRubrique($r3);

        $manager->persist($sr6);

        $p16 = new Produit();
        $p16->setLibelleCourt("La trompette")
           ->setPrixAchat(50)
           ->setImage("img\p16.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("La trompette classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr6);

        $manager->persist($p16);

        $p17 = new Produit();
        $p17->setLibelleCourt("Le cornet")
           ->setPrixAchat(200)
           ->setImage("img\p17.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le cornet classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr6);

        $manager->persist($p17);

        $p18 = new Produit();
        $p18->setLibelleCourt("Le bugle")
           ->setPrixAchat(3000)
           ->setImage("img\p18.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le bugle classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr6);

        $manager->persist($p18);

        //
        $sr7 = new SousRubrique();
        $sr7->setNomSousRubrique("Les cuivres de taille moyenne");
        $sr7->setImage("img\sr7.jpg");
        $sr7->setRubrique($r3);

        $manager->persist($sr7);

        $p19 = new Produit();
        $p19->setLibelleCourt("Le cor")
           ->setPrixAchat(700)
           ->setImage("img\p19.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le cor classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr7);

        $manager->persist($p19);

        $p20 = new Produit();
        $p20->setLibelleCourt("Le saxhorn alto")
           ->setPrixAchat(750)
           ->setImage("img\p20.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le saxhorn alto classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr7);

        $manager->persist($p20);

        //
        $sr8 = new SousRubrique();
        $sr8->setNomSousRubrique("Les cuivres de drande taille");
        $sr8->setImage("img\sr8.jpg");
        $sr8->setRubrique($r3);

        $manager->persist($sr8);

        $p21 = new Produit();
        $p21->setLibelleCourt("L'euphonium")
           ->setPrixAchat(2000)
           ->setImage("img\p21.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("L'euphonium classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr8);

        $manager->persist($p21);

        $p22 = new Produit();
        $p22->setLibelleCourt("Le saxophone baryton")
           ->setPrixAchat(900)
           ->setImage("img\p22.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le baryton classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr8);

        $manager->persist($p22);

        $p23 = new Produit();
        $p23->setLibelleCourt("Le trombone")
           ->setPrixAchat(800)
           ->setImage("img\p23.jpg")
           ->setDescription("")
           ->setStock(15)
           ->setStatut(true)
           ->setLibelleLong("Le trombone classique")
           ->setRefFournisseur("GC001")
           ->setSousRubrique($sr8);

        $manager->persist($p23);

        $manager->flush();
    }
}
