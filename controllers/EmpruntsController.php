<?php

class EmpruntsController {

    public function index() {

    }

    public function add() {

        $abonnes = Abonne::findAll();
        $ouvrages = Ouvrage::findAll();
        view('emprunts.add', compact('abonnes', 'ouvrages'));

    }

    public function save() {

        $emprunt = new Emprunt($_POST['id_abonne'], $_POST['id_ouvrage'], $_POST['id']);
        $emprunt->save();

        Header('Location: '. url('emprunts'));
        exit();

    }

    public function delete() {

    }

}