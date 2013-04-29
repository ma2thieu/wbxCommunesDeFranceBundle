<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Orm\MappedSuperclass
 * @UniqueEntity(fields = {"code"}, message = "duplicate region")
 */
class Region {

    /**
     * @ORM\Column(name="code", type="string", length=2, unique=true)
     * @ORM\Id
     */
    protected $code;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Departement", mappedBy="region", cascade={"all"})
     */
    protected $departements;


    /**
     *  Constructor
     */
    public function __construct() {
        $this->departements = new ArrayCollection();
    }


    public function __toString() {
        return $this->nom;
    }


    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }


    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }


    public function addDepartement(Departement $departement) {
        $departement->setRegion($this);
        $this->departements->add($departement);
    }

    public function removeDepartement(Departement $departement) {
        $this->departements->removeElement($departement);
    }

    public function getDepartements() {
        return $this->departements;
    }

    public function setDepartements(Collection $departements) {
        foreach ($departements as $departement) {
            $departement->setRegion($this);
        }
        $this->departements = $departements;
    }


}