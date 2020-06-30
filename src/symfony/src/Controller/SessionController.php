<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/session", name="session_") */
class SessionController extends AbstractController
{
    /**
     * @Route("/{item1}/{item2}", name="insert", methods={"GET"})
     */
    public function insertParamsIntoSession($item1, $item2, SessionInterface $session)
    {
        $session->set('item1', $item1);
        $session->set('item2', $item2);

        return $this->json(array("item1" => $item1, "item2" => $item2));
    }

    /**
     * @Route("/voir-session", name="voir", methods={"GET"})
     */
    public function voirSession(SessionInterface $session)
    {
        $item1 = $session->get('item1');
        $item2 = $session->get('item2');

        return new Response("<ul><li>$item1</li><li>$item2</li> </ul>");
    }
}
