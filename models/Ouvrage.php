<?php

class Ouvrage extends Db {

    protected $id;
    protected $titre;
    protected $auteur;

    const TABLE_NAME = 'ouvrage';

    public function __construct($auteur, $titre, $id = null) {
        $this->setAuteur($auteur);
        $this->setTitre($titre);
        $this->setId($id);
    }

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
     * Get the value of titre
     */ 
    public function titre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of auteur
     */ 
    public function auteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function nomComplet() {
        
        return $this->auteur . ' - ' . $this->titre();
    }

    /**
     * CRUD Methods
     */

    public function findOne(int $id) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id' => $id]
        ]);

        $ouvrage = new Ouvrage($data['auteur'], $data['titre'], $data['id']);

        return $ouvrage;

    }

    public function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $ouvrages = [];

        foreach($datas as $data) {
            $ouvrages[] = new Ouvrage($data['auteur'], $data['titre'], $data['id']);
        }

        return $ouvrages;

    }
    public function save() {

        $data = [
            "auteur"    => $this->auteur(),
            "titre"     => $this->titre()
        ];

        if ($this->id() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {

        if ($this->id > 0) {
            $data = [
                "auteur"    => $this->auteur(),
                "titre"     => $this->titre(),
                "id"        => $this->id()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }
        return;
    }

    public function delete() {

        $data = [
            'id' => $this->id(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);

        // On supprime aussi tous les emprunts !
        Db::dbDelete(Emprunt::TABLE_NAME, [
            'id_ouvrage' => $this->id()
        ]);

        return;
    }

}