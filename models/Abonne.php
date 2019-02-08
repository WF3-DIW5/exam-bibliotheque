<?php

class Abonne extends Db {
    
    protected $id;
    protected $nom;
    protected $prenom;

    const TABLE_NAME = 'abonne';

    public function __construct($nom, $prenom, $id = null) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
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
     * Get the value of nom
     */ 
    public function nom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function prenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function nomComplet() {
        return $this->prenom() . ' ' . $this->nom();
    }

    /**
     * CRUD Methods
     */

    public function findOne(int $id) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id' => $id]
        ]);

        $abonne = new Abonne($data['auteur'], $data['titre'], $data['id']);

        return $abonne;

    }

    public static function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $abonnes = [];

        foreach($datas as $data) {
            $abonnes[] = new Abonne($data['nom'], $data['prenom'], $data['id']);
        }

        return $abonnes;

    }
    public function save() {

        $data = [
            "nom"       => $this->nom(),
            "prenom"    => $this->prenom(),
        ];

        if ($this->id() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {

        if ($this->id > 0) {
            $data = [
                "nom"       => $this->nom(),
                "prenom"    => $this->prenom(),
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