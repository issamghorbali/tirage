<?php

namespace App\DataFixtures;

use App\Entity\Boule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=0; $i<100; $i++){
        $boule=new Boule();

        $boule->setType(rand(0, 1) ? 'special' : 'number');
        $boule->setValue(rand(1,100));
            $manager->persist($boule);
        }
        $manager->flush();
    }
}
