<?php

namespace GestionEleves\Controller\Update;

use GestionEleves\Controller\Controller;
use GestionEleves\Repository\Cours\CoursRepository;
use GestionEleves\Repository\CoursParStagiaire\CoursParStagiaireRepository;
use GestionEleves\Repository\Nationalite\NationaliteRepository;
use GestionEleves\Repository\Formation\FormationRepository;
use GestionEleves\Repository\Stagiaire\StagiaireRepository;

class UpdateController extends Controller
{

    public function update()
    {

        /*
        * Modification des données d'un stagiaire 
        */
        if (filter_input(INPUT_POST, "update")) {
            try {
                //suppression des cours choisis auparavant
                $repository = new CoursParStagiaireRepository;
                $repository->deleteCoursParStagiaire(filter_input(INPUT_POST, "id_stagiaire"));
                //insertion des cours choisis
                $insertCoursParStagiaire = new CoursParStagiaireRepository();
                if (isset($_POST["cours"]) == true) {
                    foreach ($_POST["cours"] as $value) {
                        $insertCoursParStagiaire->insertCoursParStagiaire(filter_input(INPUT_POST, "id_stagiaire"), $value);
                    }
                }
                //modification des données stagiaire
                $repository = new StagiaireRepository();
                $repository->updateStudent(
                    filter_input(INPUT_POST, "nom"),
                    filter_input(INPUT_POST, "prenom"),
                    filter_input(INPUT_POST, "nationalite"),
                    filter_input(INPUT_POST, "formation"),
                    filter_input(INPUT_POST, "id_stagiaire"),
                );
                header("location: update");
                exit;
            } catch (\PDOexception $e) {
                echo "il y a eu un problème" . $e->getCode() . " " . $e->getMessage();
            }
        }

        /*
        * Affichage / rafraichir page
        */
        try {

            //recuperation liste des nationalites
            $repositoryA = new NationaliteRepository();
            $resultatA = $repositoryA->selectAll();
            extract(["listeDesNationalites" => $resultatA]);
            //recuperation liste des formations
            $repositoryB = new FormationRepository();
            $resultatB = $repositoryB->selectAll();
            extract(["listeDesFormations" => $resultatB]);
            //recuperation liste des cours
            $repositoryC = new CoursRepository();
            $resultatC = $repositoryC->selectAll();
            extract(["listeDesCours" => $resultatC]);
            //recuperation liste des stagiaires
            $repositoryD = new StagiaireRepository();
            $resultatD = $repositoryD->selectAll();
            extract(["listeDesStagiaires" => $resultatD]);
            //recuperation liste des cours choisis par stagiaire
            $repositoryE = new CoursParStagiaireRepository();
            $resultatE = $repositoryE->selectAll();
            extract(["listeDesCoursStagiaires" => $resultatE]);
        } catch (\PDOException $e) {

            echo "il y a eu un probleme" . $e->getCode() . $e->getMessage();
        }
        include __DIR__ . "/../../../template/update/update.html.php";
    }
}
