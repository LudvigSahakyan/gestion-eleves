<?php

namespace GestionEleves\Model\Nationalite;

class NationaliteOptions
{

    /**
     * @var int
     */
    private $id_nationalite;
    /**
     * @var string
     */
    private $libelle_nationalite;


    /**
     * @return mixed
     */
    public function getIdNationalite(): ?int
    {
        return $this->id_nationalite;
    }

    /**
     * @param mixed 
     */
    public function setIdNationalite(int $id_nationalite)
    {
        $this->id_nationalite = $id_nationalite;
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
    public function setLieblleNationalite(string $libelle_nationalite)
    {
        $this->libelle_nationalite = $libelle_nationalite;
    }
}