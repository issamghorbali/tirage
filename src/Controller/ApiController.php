<?php

namespace App\Controller;

use App\Entity\Boule;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(EntityManagerInterface $manager): Response
    {

        $boules=$manager->getRepository(Boule::class)->find_tirage();

        foreach ($boules as $boule) {
            $boule->setRowIndex(1);

        }

       return $json= $this->json(['eid'=>200, 'draw_at'=>new \DateTime('now'), 'results'=>$boules]);
        return new Response($json, 200, [
            "content-type" => "application/json"
        ]);
    }
}
