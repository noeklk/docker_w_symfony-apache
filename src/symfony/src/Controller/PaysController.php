<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    /**
     * @Route("/pays", name="pays")
     */
    public function index()
    {
        return $this->render('pays/pays.html.twig', [
            'countryArray' => ["France" => 300, "Japon" => 500, "Etats-Unis" => 600, "Mexique" => 300]
        ]);
    }
}
