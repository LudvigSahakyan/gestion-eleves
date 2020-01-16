<?php

namespace GestionEleves\Repository\Stagiaire;

use GestionEleves\Connection\Connection;
use GestionEleves\Model\Stagiaire\Stagiaire;

class StagiaireRepository
{
    /*
    * Verification avant ajout du Nouveau Stagiaire
    */
    public function verifyBeforeInsert($nom, $prenom)
    {
        $dbh = Connection::getConnection();
        $sql = "CALL verif_stagiaire(:nom,:prenom,@reponse); SELECT @reponse AS reponse;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":nom", $nom);
        $sth->bindValue(":prenom", $prenom);
        $sth->execute();
        $sth->nextRowset();
        $resultat = $sth->fetchObject();
        $reponse = $resultat->reponse;
        return $reponse;
    }

    /*
    * Ajout du Nouveau Stagiaire
    */
    public function insertStudent($nom, $prenom, $nationalite, $formation)
    {
        $dbh = Connection::getConnection();
        $sql = "INSERT INTO `stagiaire`"
            . "(`nom_stagiaire`,`prenom_stagiaire`,`id_nationalite`, `id_formation`)"
            . "VALUES (:nom,:prenom,:nationalite,:formation)";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":nom", $nom);
        $sth->bindValue(":prenom", $prenom);
        $sth->bindValue(":nationalite", (int) $nationalite);
        $sth->bindValue(":formation", (int) $formation);
        $sth->execute();
    }


    /*
    * Recherche Stagiaire par Id pour ensuite ajouter le choix des cours
    */
    public function findStudent($nom, $prenom)
    {
        $dbh = Connection::getConnection();
        $sql = "CALL findStudent(:nom,:prenom,@id); SELECT @id AS id_stagiaire;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":nom", $nom);
        $sth->bindValue(":prenom", $prenom);
        $sth->execute();
        $sth->nextRowset();
        $resultat = $sth->fetchObject();
        $id_stagiaire = $resultat->id_stagiaire;
        return $id_stagiaire;
    }

    /*
    * Selection de Tous les Stagiaires
    */
    public function selectAll()
    {

        $dbh = Connection::getConnection();
        $sql = "SELECT `id_stagiaire`, `nom_stagiaire`, `prenom_stagiaire`,"
            . " `libelle_formation`, `libelle_nationalite`"
            . " FROM `stagiaire` JOIN `formation` ON stagiaire.id_formation = formation.id_formation"
            . " JOIN `nationalite` ON stagiaire.id_nationalite = nationalite.id_nationalite"
            . " ORDER BY `nom_stagiaire`;";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, Stagiaire::class);
        $listeDesStagiaires = $sth->fetchAll();
        return $listeDesStagiaires;
    }


    /*
    *  Mise a Jour des données Stagiaire
    */
    public function updateStudent($nom, $prenom, $nationalite, $formation, $id)
    {
        $dbh = Connection::getConnection();
        $sql = "UPDATE `stagiaire`"
            . "SET `nom_stagiaire`= :nom,`prenom_stagiaire`= :prenom,"
            . " `id_nationalite`= :nationalite, `id_formation`= :formation"
            . " WHERE `id_stagiaire` = :id;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":nom", $nom);
        $sth->bindValue(":prenom", $prenom);
        $sth->bindValue(":nationalite", (int) $nationalite);
        $sth->bindValue(":formation", (int) $formation);
        $sth->bindValue(":id", (int) $id);
        $sth->execute();
    }

    /*
    * Suppresion des données d'un Stagiaire avec l'id 
    */
    public function deleteStudent($id_stagiaire)
    {
        $dbh = Connection::getConnection();
        $sql = "DELETE FROM `stagiaire` WHERE `id_stagiaire` = :id_stagiaire;";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(":id_stagiaire", $id_stagiaire);
        $sth->execute();
    }
}
