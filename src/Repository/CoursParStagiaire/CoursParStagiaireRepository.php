<?php

namespace GestionEleves\Repository\CoursParStagiaire;

use GestionEleves\Connection\Connection;
use GestionEleves\Model\CoursParStagiaire\CoursParStagiaire;
use GestionEleves\Model\CoursParStagiaire\TableCoursStagiaire;

class CoursParStagiaireRepository
{

    /*
    * Trouver les cours Choisis pour un Stagiaire 
    */
    public function selectById($id_stagiaire)
    {

        $dbh = Connection::getConnection();
        $sql = "SELECT `id_stagiaire`,`nom_formateur`, `salle_cours`,`date_debut`,`date_fin`"
            . " FROM `cours` JOIN `cours_stagiaire`"
            . " ON cours.id_cours = cours_stagiaire.id_cours"
            . " WHERE id_stagiaire = :id_stagiaire;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":id_stagiaire", (int) $id_stagiaire);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, CoursParStagiaire::class);
        $listeDesCoursChoisis = $sth->fetchAll();
        return $listeDesCoursChoisis;
    }

    public function selectAll()
    {

        $dbh = Connection::getConnection();
        $sql = "SELECT * FROM `cours_stagiaire`";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, TableCoursStagiaire::class);
        $listeDesFormations = $sth->fetchAll();
        return $listeDesFormations;


    }


    /*
    * Inserer les cours choisis par un stagiaire
    */
    public function insertCoursParStagiaire($id_stagiaire, $id_cours)
    {

        $dbh = Connection::getConnection();
        $sql = "INSERT INTO `cours_stagiaire`"
            . "(`id_stagiaire`,`id_cours`)"
            . "VALUES (:stagiaire,:cours)";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":stagiaire", (int) $id_stagiaire);
        $sth->bindValue(":cours", (int) $id_cours);
        $sth->execute();
    }

    /*
    * Suppression des cours pour un stagiaire 
    * !intervient avant suppression du stagiaire
    */
    public function deleteCoursParStagiaire($id_stagiaire)
    {

        $dbh = Connection::getConnection();
        $sql = "DELETE FROM `cours_stagiaire` WHERE `id_stagiaire` = :id_stagiaire;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":id_stagiaire", (int) $id_stagiaire);
        $sth->execute();
    }
}
