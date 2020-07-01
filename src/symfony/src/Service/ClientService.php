<?php

namespace App\Service;

use App\Entity\Client;
use App\Repository\ClientRepository;

class ClientService
{
    private $_clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->_clientRepository = $clientRepository;
    }

    public function createClient($nom, $cagnotte, $commentaires)
    {
        $c = new Client();

        $c = $c->setNom($nom);
        $c = $c->setCagnotte($cagnotte);
        $c = $c->setCommentaires($commentaires);

        return $this->_clientRepository->createClient($c);
    }

    public function getClient($id)
    {
        return $this->_clientRepository->getClientByID($id);
    }
}
