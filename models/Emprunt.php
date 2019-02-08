<?php

class Emprunt extends Db {

    protected $id;
    protected $id_abonne;
    protected $id_ouvrage;

    const TABLE_NAME = 'association_abonne_ouvrage';

    /**
     * Get the value of id
     */ 
    public function id()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_abonne
     */ 
    public function idAbonne()
    {
        return $this->id_abonne;
    }

    /**
     * Set the value of id_abonne
     *
     * @return  self
     */ 
    public function setIdAbonne($id_abonne)
    {
        $this->id_abonne = $id_abonne;

        return $this;
    }

    /**
     * Get the value of id_ouvrage
     */ 
    public function idOuvrage()
    {
        return $this->id_ouvrage;
    }

    /**
     * Set the value of id_ouvrage
     *
     * @return  self
     */ 
    public function setIdOuvrage($id_ouvrage)
    {
        $this->id_ouvrage = $id_ouvrage;

        return $this;
    }
}