<?php

namespace GestionEleves\Repository\Cours;

use GestionEleves\Connection\Connection;
use GestionEleves\Model\Cours\CoursCheckbox;


class CoursRepository
{

    /*
    * Trouver toute la liste des Cours
    */
    public function selectAll()
    {

        $dbh = Connection::getConnection();
        $sql = "SELECT * FROM `cours`";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, CoursCheckbox::class);
        $listeDesCours = $sth->fetchAll();
        return $listeDesCours;
    }
}
