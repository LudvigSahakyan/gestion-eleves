<?php

namespace GestionEleves\Model\Cours;

class CoursCheckbox
{

    /**
     * @var string
     */
    private $nom_formateur;
    /**
     * @var string
     */
    private $salle_cours;
    /**
     * @var string
     */
    private $date_debut;
    /**
     * @var string
     */
    private $date_fin;
    /**
     * @var int
     */
    private $id_formation;


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

     /**
     * @return mixed
     */
    public function getNomFormateur(): ?string
    {
        return $this->nom_formateur;
    }

    /**
     * @param mixed 
     */
    public function setNomFormateur(string $nom_formateur)
    {
        $this->nom_formateur = $nom_formateur;
    }

      /**
     * @return mixed
     */
    public function getSalleCours(): ?string
    {
        return $this->salle_cours;
    }

    /**
     * @param mixed 
     */
    public function setSalleCours(string $salle_cours)
    {
        $this->salle_cours = $salle_cours;
    }

       /**
     * @return mixed
     */
    public function getDateDebut(): ?string
    {
        return $this->date_debut;
    }

    /**
     * @param mixed 
     */
    public function setDateDebut(string $date_debut)
    {
        $this->date_debut = $date_debut;
    }

           /**
     * @return mixed
     */
    public function getDateFin(): ?string
    {
        return $this->date_fin;
    }

    /**
     * @param mixed 
     */
    public function setDateFin(string $date_fin)
    {
        $this->date_fin = $date_fin;
    }


        /**
     * @return mixed
     */
    public function getIdFormation(): ?int
    {
        return $this->id_formation;
    }

    /**
     * @param mixed 
     */
    public function setIdFormation(int $id_formation)
    {
        $this->id_formation = $id_formation;
    }




}