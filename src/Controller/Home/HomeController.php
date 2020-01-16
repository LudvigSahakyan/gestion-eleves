<?php

namespace GestionEleves\Controller\Home;

use GestionEleves\Controller\Controller;
use GestionEleves\Repository\CoursParStagiaire\CoursParStagiaireRepository;
use GestionEleves\Repository\Stagiaire\StagiaireRepository;

class HomeController extends Controller
{


    public function read()
    {


        /*
        * Affichage liste stagiaire page Acceuil
        */
        try {
            //recuperation liste des stagiaires
            $repositoryA = new StagiaireRepository();
            $resultat = $repositoryA->selectAll();
            extract(["listeDesStagiaires" => $resultat]);
            //recuperation liste des cours choisis par stagiaire
            $repositoryB = new CoursParStagiaireRepository();
        } catch (\PDOException $e) {

            echo "il y a eu un probleme" . $e->getMessage();
        }


        include __DIR__ . "/../../../template/home/home.html.php";
    }
}
