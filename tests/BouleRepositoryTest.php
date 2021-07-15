<?php

namespace App\Tests;

use App\Entity\Boule;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BouleRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();



    }

    public function testSomething(): void
    {
        $boule = $this->entityManager
            ->getRepository(Boule::class)
            ->findOneBy(['type' => 'number'])
        ;

        $this->assertSame('number', $boule->getType());
    }
}
