<?php

namespace App\Controller;

use App\Helper\MathHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello", name="hello")
     */
    public function hello($number, $pays, MathHelper $mathHelper)
    {
        $test = $mathHelper->addition(5, 10);
        return new Response("Bonjour au $number habitants venant de $pays " . $test);
    }
}
