<?php

class OuvragesController {

    public function index() {

    }

    public function show($id) {

    }

    public function add() {
        view('ouvrages.add');

    }

    public function save() {

        $ouvrage = new Ouvrage($_POST['auteur'], $_POST['titre'], $_POST['id']);
        $ouvrage->save();
        Header('Location: '. url('ouvrages'));
        exit();

    }

    public function edit($id) {

    }

    public function delete($id) {

    }

}