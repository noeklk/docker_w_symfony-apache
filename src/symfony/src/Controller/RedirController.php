<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/** @Route("/redirection", name="redirect-to_") */
class RedirController extends AbstractController
{
    /**
     * @Route("/", name="redir")
     */
    public function index()
    {
        return $this->render('redir/index.html.twig', [
            'controller_name' => 'RedirController',
        ]);
    }

    /** 
     * @Route(
     * "/lemonde",
     * name="lemonde",
     * methods={"GET"}
     * )
     */
    public function lemondeRedirection(){
        $url = "http://www.lemonde.fr";
        
        return $this->redirect($url);
    }

    /** 
     * @Route(
     * "/form/check-name",
     * name="form_check-name"
     * )
     */
    public function formCheckNameRedirection(Request $req){
        $nom = $req->query->get('nom');
        $prenom = $req->query->get('prenom');

        return $this->redirectToRoute('check-name', array('nom' => $nom, 'prenom' => $prenom));
    }
}
