<?php

namespace GestionEleves\Controller\Delete;

use GestionEleves\Controller\Controller;
use GestionEleves\Repository\CoursParStagiaire\CoursParStagiaireRepository;
use GestionEleves\Repository\Stagiaire\StagiaireRepository;


class DeleteController extends Controller
{


    public function delete()
    {

        /*
        * Suppresion des donnée d'un stagiaire par id
        */
        if (filter_input(INPUT_POST, "delete")) {
            try {

                //suppression des cours choisis par stagiaire
                $repository = new CoursParStagiaireRepository();
                $repository->deleteCoursParStagiaire(filter_input(INPUT_POST, "id_stagiaire"));
                //suppression stagiaire
                $repository = new StagiaireRepository();
                $repository->deleteStudent(
                    filter_input(INPUT_POST, "id_stagiaire"),
                );
                header("location: delete");
                exit;
            } catch (\PDOexception $e) {
                $e->getCode() . " " . $e->getMessage();
            }
        }
        /*
        * Affichage / rafraichir page
        */
        try {
            //recuperation liste des stagiaires
            $repository = new StagiaireRepository();
            $resultat = $repository->selectAll();
            extract(["listeDesStagiaires" => $resultat]);
            //recuperation liste des cours choisis par stagiaire
            $repositoryB = new CoursParStagiaireRepository(); 
            
        } catch (\PDOException $e) {

            $e->getMessage();
        }
        include __DIR__ . "/../../../template/delete/delete.html.php";
    }
}
