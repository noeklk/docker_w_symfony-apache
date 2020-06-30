<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/form", name="form_") */
class FormController extends AbstractController
{
    /**
     * @Route("/", name="get-time")
     */
    public function index()
    {
        $time = new \DateTime();
        $date = $time->format('d-m-Y');
        $heure = $time->format('H:i:s');

        return new Response("<h1>Nous sommes le $date et il est $heure<h1>");
    }

    /** 
     * @Route(
     * "/check-name",
     * name="check-name",
     * methods={"GET"}
     * )
     */
    public function checkName(Request $req)
    {
        $nom = $req->query->get('nom');
        $prenom = $req->query->get('prenom');

        if (preg_match('/\d+/', $nom) || preg_match('/\d+/', $prenom)) {
            throw $this->createNotFoundException('Le nom ou prénom ne doivent pas comporter de chiffre');
        }

        if (ucwords($nom) != $nom || ucwords($prenom) != $prenom) {
            throw new \Exception('La première lettre du nom ou prénom doivent être en majuscule');
        }

        return new Response("<h1>Bonjour, $prenom $nom votre nom et prénom sont valide</h1>");
    }
}
