<?php

namespace GestionEleves\Model\Stagiaire;

class Stagiaire
{

    /**
     * @var int
     */
    private $id_stagiaire;
    /**
     * @var string
     */
    private $nom_stagiaire;
    /**
     * @var string
     */
    private $prenom_stagiaire;
    /**
     * @var string
     */
    private $libelle_formation;
    /**
     * @var string
     */
    private $libelle_nationalite;


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
    public function getNomStagiaire(): ?string
    {
        return $this->nom_stagiaire;
    }

    /**
     * @param mixed
     */
    public function setNomStagiaire(string $prenom_stagiaire)
    {
        $this->prenom_stagiaire = $prenom_stagiaire;
    }

    /**
     * @return mixed
     */
    public function getPrenomStagiaire(): ?string
    {
        return $this->prenom_stagiaire;
    }

    /**
     * @param mixed
     */
    public function setPrenomStagiaire(string $nom_stagiaire)
    {
        $this->nom_stagiaire = $nom_stagiaire;
    }


    /**
     * @return mixed
     */
    public function getLibelleFormation(): ?string
    {
        return $this->libelle_formation;
    }

    /**
     * @param mixed 
     */
    public function setlibelleFormation(string $libelle_formation)
    {
        $this->libelle_formation = $libelle_formation;
    }

    /**
     * @return mixed
     */
    public function getLibelleNationalite(): ?string
    {
        return $this->libelle_nationalite;
    }

    /**
     * @param mixed 
     */
    public function setLibelleNationalite(string $libelle_nationalite)
    {
        $this->libelle_nationalite = $libelle_nationalite;
    }
}