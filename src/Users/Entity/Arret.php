<?php

namespace App\Users\Entity;

class Arret
{
    protected $id;

    protected $depart;
    
    protected $arrive;
    
    protected $nomArret;
    

    public function __construct($id, $depart, $arrive, $nomArret)
    {
        $this->id = $id;    
        $this->depart = $depart;
        $this->arrive = $arrive;
        $this->nomArret = $nomArret;
        
       
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setNomArret($nomArret)
    {
        $this->nomArret = $nomArret;
    }

       
    public function setArrive($arrive)
    {
        $this->arrive = $arrive;
    }
    
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }
   
    public function getId()
    {
        return $this->id;
    }
      
    public function getArrive()
    {
        return $this->arrive;
    }
    
    public function getDepart()
    {
        return $this->depart;
    }
    
    public function getNomArret()
    {
        return $this->nomArret;
    }
    
    


    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;        
        $array['depart'] = $this->depart;
        $array['arrive'] = $this->arrive;
        $array['nomArret'] = $this->nomArret;

        return $array;
    }
}
