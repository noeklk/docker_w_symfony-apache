<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index()
    {
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

    /** 
     * @Route(
     * "/time",
     * name="time-view",
     * methods={"GET"}
     * )
     */
    public function getTime()
    {
        $time = new \DateTime();
        $date = $time->format('d-m-Y');
        $heure = $time->format('H:i:s');

        return new Response("Nous sommes le $date et il est $heure");
    }
}
