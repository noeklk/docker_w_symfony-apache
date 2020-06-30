<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
    public function lemondeRedirection()
    {
        $url = "http://www.lemonde.fr";

        return $this->redirect($url);
    }

    /** 
     * @Route(
     * "/form/check-name/{nom}/{prenom}",
     * name="form_check-name"
     * )
     */
    public function formCheckNameRedirection($nom, $prenom)
    {
        $url = $this->generateUrl("check-name", ['nom' => $nom, 'prenom' => $prenom], UrlGeneratorInterface::ABSOLUTE_URL);
        return new RedirectResponse($url);
    }
}
