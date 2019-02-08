<?php

class PagesController {

    public function home() {

        view('pages.home');

    }

    public function divers() {

        echo "<hr>Afficher le nombre d'abonnés.";
        var_dump(Divers::nombreAbonnes());
        echo "<hr>Afficher le nombre d'ouvrages.";
        var_dump(Divers::nombreOuvrages());
        echo "<hr>Afficher le nombre d'associations.";
        var_dump(Divers::nombreAssociations());
        echo "<hr>Afficher les ouvrages n'ayant pas été empruntés.";
        var_dump(Divers::ouvragesPasEmpruntes());
        echo "<hr>Afficher les abonnés n'ayant pas emprunté de livre.";
        var_dump(Divers::abonnesPasEmprunteurs());
        echo "<hr>Afficher tous les ouvrages empruntés par 1 abonné, trouvé par son nom (le WHERE doit contenir le nom et pas l'ID, de l'abonné de votre choix).";
        var_dump(Divers::ouvragesEmpruntesParEmmaWatson());
        echo "<hr>Afficher tous les abonnés (meme ceux qui n'ont pas emprunté) ainsi que les ouvrages - pour ceux qui ont emprunté.";
        var_dump(Divers::tousLesAbonnesPlusOuvrages());
        echo "<hr>Afficher les ouvrages (meme ceux qui n'ont pas été empruntés), ainsi que les abonnés - pour ceux qui ont été empruntés.";
        var_dump(Divers::tousLesOuvragesPlusAbonnes());
    }
}