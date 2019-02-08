<?php

class AbonnesController {

    public function index() {

        $abonnes = Abonne::findAll();
        view('abonnes.index', compact('abonnes'));

    }

    public function show($id) {

        $abonne = Abonne::findOne($id);
        view('abonnes.show', compact('abonne'));
    }

    public function add() {

        view('abonnes.add');
    }

    public function save() {

        $abonne = new Abonne($_POST['nom'], $_POST['prenom'], $_POST['id']);
        $abonne->save();
        Header('Location: '. url('abonnes'));
        exit();

    }

    public function edit($id) {
        $abonne = Abonne::findOne($id);
        view('abonnes.add', compact('abonne'));
    }

    public function delete($id) {

    }   
}