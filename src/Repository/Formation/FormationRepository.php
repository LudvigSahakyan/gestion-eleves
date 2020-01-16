<?php

namespace GestionEleves\Repository\Formation;

use GestionEleves\Connection\Connection;
use GestionEleves\Model\Formation\FormationOptions;

class FormationRepository
{

    /*
    * Trouver toute la liste des Formations
    */
    public function selectAll()
    {

        $dbh = Connection::getConnection();
        $sql = "SELECT * FROM `formation`";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, FormationOptions::class);
        $listeDesFormations = $sth->fetchAll();
        return $listeDesFormations;
    }
}
