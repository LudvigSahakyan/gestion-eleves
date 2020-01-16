<?php

namespace GestionEleves\Model\Formation;

class FormationOptions
{

    /**
     * @var int
     */
    private $id_formation;
    /**
     * @var string
     */
    private $libelle_formation;


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
    public function setLibelleFormation(string $libelle_formation)
    {
        $this->libelle_formation = $libelle_formation;
    }
}
