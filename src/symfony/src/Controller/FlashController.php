<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/flash") */
class FlashController extends AbstractController
{
    /**
     * @Route("/{message}/{message2}/{message3}", name="flash",
     * methods={"GET"})
     */
    public function insertAndViewFlashMessage($message, $message2, $message3)
    {
        $messageArray = func_get_args();

        foreach ($messageArray as $key => $value) {
            $this->addFlash('message', $value);
        }

        return $this->render('flash/view-flash-message.html.twig');
    }

    /**
     * @Route("/show-locale/{_locale}", name="local",
     * methods={"GET"},
     * defaults={
     *      "_locale": "fr"
     * }
     * )
     */
    public function showLocale($_locale)
    {
        // $locale = $request->getLocale();

        return new Response($_locale);
    }
}
