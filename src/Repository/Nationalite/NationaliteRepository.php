<?php

namespace GestionEleves\Repository\Nationalite;

use GestionEleves\Connection\Connection;
use GestionEleves\Model\Nationalite\NationaliteOptions;

class NationaliteRepository
{

  /*
  * Trouver toute la liste des Nationalites
  */
  public function selectAll()
  {

    $dbh = Connection::getConnection();
    $sql = "SELECT * FROM `nationalite`";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $sth->setFetchMode(\PDO::FETCH_CLASS, NationaliteOptions::class);
    $listeDesNationalites = $sth->fetchAll();
    return $listeDesNationalites;
  }
}
