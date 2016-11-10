<?php

namespace App\Users\Entity;

class User
{
    protected $id;

    protected $nom;

    protected $prenom;
    
    protected $groupe;
    
    protected $depart;
    
    protected $arrive;
    

    public function __construct($id, $nom, $prenom, $groupe, $depart, $arrive)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->groupe = $groupe;
        $this->depart = $depart;
        $this->arrive = $arrive;
        
       
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    public function setGroupe($nom)
    {
        $this->groupe = $groupe;
    }
    
    public function setArrive($arrive)
    {
        $this->arrive = $arrive;
    }
    
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }
    

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getArrive()
    {
        return $this->arrive;
    }
    
    public function getDepart()
    {
        return $this->depart;
    }
    
    
    public function getGroupe()
    {
        return $this->groupe;
    }
    


    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['prenom'] = $this->prenom;
        $array['groupe'] = $this->groupe;
        $array['depart'] = $this->depart;
        $array['arrive'] = $this->arrive;
       

        return $array;
    }
}
