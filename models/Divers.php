<?php

class Divers extends Db {

    // Afficher le nombre d'abonnés.
    public static function nombreAbonnes() {
        $req = 'SELECT COUNT(*)
                FROM abonne';

        return Db::dbQuery($req);
    }

    // Afficher le nombre d'ouvrages.
    public static function nombreOuvrages() {
        $req = 'SELECT COUNT(*)
                FROM ouvrage';

        return Db::dbQuery($req);
    }

    // Afficher le nombre d'associations.
    public static function nombreAssociations() {
        $req = 'SELECT COUNT(*)
                FROM association_abonne_ouvrage';

        return Db::dbQuery($req);
    }

    // Afficher les ouvrages n'ayant pas été empruntés.
    public static function ouvragesPasEmpruntes() {
        $req = 'SELECT *
                FROM ouvrage
                LEFT JOIN association_abonne_ouvrage ON association_abonne_ouvrage.id_ouvrage = ouvrage.id
                WHERE id_abonne IS NULL';

        return Db::dbQuery($req);
    }

    // Afficher les abonnés n'ayant pas emprunté de livre.
    public static function abonnesPasEmprunteurs() {
        $req = 'SELECT *
                FROM abonne
                LEFT JOIN association_abonne_ouvrage ON association_abonne_ouvrage.id_abonne = abonne.id
                WHERE id_ouvrage IS NULL';

        return Db::dbQuery($req);
    }

    // Afficher tous les ouvrages empruntés par 1 abonné, trouvé par son nom (le WHERE doit contenir le nom et pas l'ID, de l'abonné de votre choix).
    public static function ouvragesEmpruntesParEmmaWatson() {
        $req = 'SELECT titre, auteur
                FROM ouvrage
                INNER JOIN association_abonne_ouvrage ON association_abonne_ouvrage.id_ouvrage = ouvrage.id
                INNER JOIN abonne ON association_abonne_ouvrage.id_abonne = abonne.id
                WHERE nom = "Watson" AND prenom = "Emma"';

        return Db::dbQuery($req);
    }

    // Afficher tous les abonnés (meme ceux qui n'ont pas emprunté) ainsi que les ouvrages - pour ceux qui ont emprunté.
    public static function tousLesAbonnesPlusOuvrages() {
        $req = 'SELECT *
                FROM abonne
                LEFT JOIN association_abonne_ouvrage ON abonne.id = association_abonne_ouvrage.id_abonne
                LEFT JOIN ouvrage ON ouvrage.id = association_abonne_ouvrage.id_ouvrage';

        return Db::dbQuery($req);
    }

    // Afficher les ouvrages (meme ceux qui n'ont pas été empruntés), ainsi que les abonnés - pour ceux qui ont été empruntés.
    public static function tousLesOuvragesPlusAbonnes() {
        $req = 'SELECT *
                FROM ouvrage
                LEFT JOIN association_abonne_ouvrage ON ouvrage.id = association_abonne_ouvrage.id_ouvrage
                LEFT JOIN abonne ON abonne.id = association_abonne_ouvrage.id_abonne';

        return Db::dbQuery($req);
    }

}