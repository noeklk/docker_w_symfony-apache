<?php

namespace App\Controller;

use App\Entity\Client;
use App\Service\ClientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    private $_clientService;

    public function __construct(ClientService $clientService)
    {
        $this->_clientService = $clientService;
    }

    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ClientController.php',
        ]);
    }

    /**
     * @Route(
     * "/create-client",
     * methods={"POST"}
     * )
     */
    public function createClient(Request $req)
    {
        $nom = $req->request->get('nom');
        $cagnotte = $req->request->get('cagnotte');
        $commentaires = $req->request->get('commentaires');

        return $this->_clientService->createClient($nom, $cagnotte, $commentaires);
    }

    /**
     * @Route(
     * "/get-client-by-id/{id}",
     * methods={"GET"}
     * )
     */
    public function getClient($id)
    {
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);
        // return $this->_clientService->getClient($id);
        return $client;
    }
}
