<?php

namespace GestionEleves\Controller\Insert;

use GestionEleves\Controller\Controller;
use GestionEleves\Repository\Cours\CoursRepository;
use GestionEleves\Repository\CoursParStagiaire\CoursParStagiaireRepository;
use GestionEleves\Repository\Nationalite\NationaliteRepository;
use GestionEleves\Repository\Formation\FormationRepository;
use GestionEleves\Repository\Stagiaire\StagiaireRepository;

class InsertController extends Controller
{

    public function new()
    {

        /*
        * Insertion donnée nouveau Stagiaire apres verification
        */
        if (filter_input(INPUT_POST, "insert")) {
            try {
                //on verifie si il y a des doublons
                $repository = new StagiaireRepository();
                $reponse = $repository->verifyBeforeInsert(
                    filter_input(INPUT_POST, "nom"),
                    filter_input(INPUT_POST, "prenom"),
                );
                if ($reponse === "0") {
                    //insertion du nouveau stagiaire
                    $repository = new StagiaireRepository();
                    $repository->insertStudent(
                        filter_input(INPUT_POST, "nom"),
                        filter_input(INPUT_POST, "prenom"),
                        filter_input(INPUT_POST, "nationalite"),
                        filter_input(INPUT_POST, "formation")
                    );
                    //retrouver l'id du stagiaire ajouté
                    $findStudent = new StagiaireRepository();
                    $id_student = $findStudent->findStudent(
                        filter_input(INPUT_POST, "nom"),
                        filter_input(INPUT_POST, "prenom")
                    );
                    //insretion des cours choisis par stagiaire 
                    $insertCoursParStagiaire = new CoursParStagiaireRepository();
                    foreach ($_POST["cours"] as $value) {
                        $insertCoursParStagiaire->insertCoursParStagiaire($id_student, $value);
                    }
                    header("location: insert");
                    exit;
                } else {
                    header("location: insert");
                }
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
        } catch (\PDOException $e) {

            echo "il y a eu un probleme" . $e->getMessage();
        }

        include __DIR__ . "/../../../template/insert/insert.html.php";
    }
}
