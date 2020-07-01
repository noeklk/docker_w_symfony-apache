<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository
{
    private $_mr;

    public function __construct(ManagerRegistry $mr)
    {
        $this->_mr = $mr;
    }

    public function createClient(Client $client)
    {
        $em = $this->_mr->getManagerForClass(Client::class);

        $em->persist($client);
        $em->flush();

        return new Response('Client crée: ' . $client->getId());
    }

    public function getClientByID($id)
    {
        $em = $this->_mr->getManagerForClass(Client::class);
        $client = $em->find(Client::class, $id);

        // $client = $em->getRepository(Client::class)->find($id);

        if (!$client) {
            return new Response("Client portant l'id: $id non trouvé", Response::HTTP_NOT_FOUND);
        }

        return new Response("Client trouvé", Response::HTTP_FOUND);
    }

    // /**
    //  * @return Client[] Returns an array of Client objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Client
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
