<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @UniqueEntity(fields = {"code"}, message = "duplicate region")
 */
class Region {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="string", length=8, unique=true)
     */
    private $code;

    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    
    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Departement", mappedBy="region", cascade={"all"})
     */
    protected $departements;

    
    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Commune", mappedBy="region", cascade={"all"})
     */
    protected $communes;


    /**
     *  Constructor
     */
    public function __construct() {
        $this->departements = new ArrayCollection();
        $this->communes = new ArrayCollection();
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


    public function addCommune(Commune $commune) {
        $commune->setRegion($this);
        $this->communes->add($commune);
    }

    public function removeCommune(Commune $commune) {
        $this->communes->removeElement($commune);
    }

    public function getCommunes() {
        return $this->communes;
    }

    public function setCommunes(Collection $communes) {
        foreach ($communes as $commune) {
            $commune->setRegion($this);
        }
        $this->communes = $communes;
    }

}