<?php

namespace App\Users\Repository;

use App\Users\Entity\Arret;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class ArretRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of users to return.
    * @param int $offset
    *   The number of users to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('users', 'u');

       $statement = $queryBuilder->execute();
       $usersData = $statement->fetchAll();
       foreach ($usersData as $userData) {
           $userEntityList[$userData['id']] = new User($userData['id'], $userData['nomArret'],$userData['depart'],$userData['arrive']);
       }

       return $userEntityList;
   }

   /**
    * Returns an User object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getById($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('arrets', 'u')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $userData = $statement->fetchAll();

       return new User($userData[0]['id'], $userData[0]['nomArret'], $userData[0]['arrive'], $userData[0]['depart']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('arrets')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('arrets')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['nomArret']) {
            $queryBuilder
              ->set('nomArret', ':nomArret')
              ->setParameter(':nomArret', $parameters['nomArret']);
        }

      
           if ($parameters['arrive']) {
            $queryBuilder
            ->set('arrive', ':arrive')
            ->setParameter(':arrive', $parameters['arrive']);
        }
        
           if ($parameters['depart']) {
            $queryBuilder
            ->set('depart', ':depart')
            ->setParameter(':depart', $parameters['depart']);
        }
        
        
        
        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('arrets')
          ->values(
              array(
                'nomArret' => ':nomArret',              
                  'depart' => ':depart',
                  'arrive' => ':arrive',
                  
              )
          )
          ->setParameter(':nomArret', $parameters['nomArret'])          
          ->setParameter(':arrive', $parameters['arrive'])
          ->setParameter(':depart', $parameters['depart'])
          ;
        
        $statement = $queryBuilder->execute();
    }
}
