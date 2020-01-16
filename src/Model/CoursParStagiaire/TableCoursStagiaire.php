<?php

namespace GestionEleves\Model\CoursParStagiaire;

class TableCoursStagiaire
{

    /**
     * @var int
     */
    private $id_cours_stagiaire;
    /**
     * @var int
     */
    private $id_stagiaire;
    /**
     * @var int
     */
    private $id_cours;


    /**
     * @return mixed
     */
    public function getIdCoursStagiaire(): ?int
    {
        return $this->id_cours_stagiaire;
    }

    /**
     * @param mixed 
     */
    public function setIdCoursStagiaire(int $id_cours_stagiaire)
    {
        $this->id_cours_stagiaire = $id_cours_stagiaire;
    }

        /**
     * @return mixed
     */
    public function getIdStagiaire(): ?int
    {
        return $this->id_stagiaire;
    }

    /**
     * @param mixed 
     */
    public function setIdStagiaire(int $id_stagiaire)
    {
        $this->id_stagiaire = $id_stagiaire;
    }
        /**
     * @return mixed
     */
    public function getIdCours(): ?int
    {
        return $this->id_cours;
    }

    /**
     * @param mixed 
     */
    public function setIdCours(int $id_cours)
    {
        $this->id_cours = $id_cours;
    }


}