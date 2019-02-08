<?php

class Emprunt extends Db {

    protected $id;
    protected $id_abonne;
    protected $id_ouvrage;

    const TABLE_NAME = 'association_abonne_ouvrage';

    public function __construct($id_abonne, $id_ouvrage, $id = null) {
        $this->setIdAbonne($id_abonne);
        $this->setIdOuvrage($id_ouvrage);
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

    public function findOne(int $id) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id' => $id]
        ]);

        $emprunt = new Emprunt($data['id_abonne'], $data['id_ouvrage'], $data['id']);

        return $emprunt;

    }

    public function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $emprunt = [];

        foreach($datas as $data) {
            $emprunt[] = new Emprunt($data['id_abonne'], $data['id_ouvrage'], $data['id']);
        }

        return $emprunt;

    }
    public function save() {

        $data = [
            "id_abonne"     => $this->idAbonne(),
            "id_ouvrage"    => $this->idOuvrage(),
        ];

        if ($this->id() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {

        if ($this->id > 0) {
            $data = [
                "id_abonne"     => $this->idAbonne(),
                "id_ouvrage"    => $this->idOuvrage(),
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
            'id_abonne' => $this->id()
        ]);

        return;
    }
}