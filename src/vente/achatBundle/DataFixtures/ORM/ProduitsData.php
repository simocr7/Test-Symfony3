<?php

namespace vente\achatBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use vente\achatBundle\Entity\Produit;

class ProduitsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produits1 = new Produit();
        $produits1->setNom('asus');
        $produits1->setDescription('ordinateur pantium3 modèle 2018 pc portable ');
        $produits1->setPrix('1200');
        $manager->persist($produits1);
        
        $produits2 = new Produit();
        $produits2->setNom('R1');
        $produits2->setDescription('Moto gp modèle 2018');
        $produits2->setPrix('2500');
        $manager->persist($produits2);
        
        $produits3 = new Produit();
        $produits3->setNom('Pencil');
        $produits3->setDescription('Digital stylus for IPad and IPhone ');
        $produits3->setPrix('50');
        $manager->persist($produits3);
        
        $produits5 = new Produit();
        $produits5->setNom('Mazerati');
        $produits5->setDescription('MODÈLE:Quattroporte, VERSIONS:6,NOMBRE MOTEURS:2 ');
        $produits5->setPrix('10302');
        $manager->persist($produits5);
        
        $produits6 = new Produit();
        $produits6->setNom('BMX');
        $produits6->setDescription('BMX RADIO BIKES DICE FS 20" Vert 2018 ');
        $produits6->setPrix('352');
        $manager->persist($produits6);
        
        $produits7 = new Produit();
        $produits7->setNom('Smart TV');
        $produits7->setDescription(' un téléviseur raccordé, directement ou indirectement, à Internet afin de fournir un ensemble de services aux téléspectateurs. ');
        $produits7->setPrix('10520');
        $manager->persist($produits7);
        
        $produits8 = new Produit();
        $produits8->setNom('Samsung Galaxy Tab');
        $produits8->setDescription("La Galaxy Tab 4 10 pouces est la nouvelle tablette grand format d'entrée de gamme de Samsung. Limitée dans ses capacités multimédia, elle offre toutefois un rapport qualité-prix plus qu'intéressant ");
        $produits8->setPrix('300');
        $manager->persist($produits8);
        
        $produits9 = new Produit();
        $produits9->setNom('Play4');
        $produits9->setDescription('Modèle CUH-2000, Processeur single-chip spécifique, Port de sortie HDMI™ (sortie HDR prise en charge) ');
        $produits9->setPrix('1500');
        $manager->persist($produits9);
        
        $produits10 = new Produit();
        $produits10->setNom('Air max');
        $produits10->setDescription('Chaussure de running pour homme');
        $produits10->setPrix('152');
        $manager->persist($produits10);
        
        $produits11 = new Produit();
        $produits11->setNom('Cake');
        $produits11->setDescription('dark chocolate fudge Size: 6″ or 8″ Weight:  600g  or 1.2kg ');
        $produits11->setPrix('120');
        $manager->persist($produits11);
        
        $produits12 = new Produit();
        $produits12->setNom('Munster');
        $produits12->setDescription('Frommage saint nectaire fermier');
        $produits12->setPrix('17');
        $manager->persist($produits12);
        
        $produits13 = new Produit();
        $produits13->setNom('C4');
        $produits13->setDescription('Pre workout extreme energy');
        $produits13->setPrix('350');
        $manager->persist($produits13);

        $manager->flush();

    }

    public function getOrder()
    {
        return 6;
    }
}