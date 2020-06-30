<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/twig") */
class TwigExoController extends AbstractController
{
    /**
     * @Route("/array", name="twig_array")
     */
    public function twigArray()
    {
        return $this->render('twig_exo/array.html.twig', [
            'arrayExample' => ['test', 'test2'],
        ]);
    }

    /**
     * @Route("/object", name="twig_object")
     */
    public function twigObject()
    {
        $object = (object) [];

        return $this->render('twig_exo/object.html.twig', [
            'objectExample' => ["prenom" => ["henry", "jacques"], "age" => [32, 28]],
        ]);
    }
}
