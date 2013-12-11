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
 * @UniqueEntity(fields = {"code"}, message = "duplicate departement")
 */
class Departement {

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=8, unique=true)
     */
    private $code;

    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    
    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Region", inversedBy="departements", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    private $region;


    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Commune", mappedBy="departement", cascade={"all"})
     */
    protected $communes;
    

    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Localisation", mappedBy="departement", cascade={"all"})
     */
    protected $localisations;


    /**
     *  Constructor
     */
    public function __construct() {
        $this->commmunes = new ArrayCollection();
        $this->localisations = new ArrayCollection();
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


    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }


    public function addCommune(Commune $commmune) {
        $commmune->setDepartement($this);
        $this->commmunes->add($commmune);
    }

    public function removeCommune(Commune $commmune) {
        $this->commmunes->removeElement($commmune);
    }

    public function getCommunes() {
        return $this->commmunes;
    }

    public function setCommunes(Collection $commmunes) {
        foreach ($commmunes as $commmune) {
            $commmune->setDepartement($this);
        }
        $this->commmunes = $commmunes;
    }


    public function addLocalisation(Localisation $localisation) {
        $localisation->setDepartement($this);
        $this->localisations->add($localisation);
    }

    public function removeLocalisation(Localisation $localisation) {
        $this->localisations->removeElement($localisation);
    }

    public function getLocalisations() {
        return $this->localisations;
    }

    public function setLocalisations(Collection $localisations) {
        foreach ($localisations as $localisation) {
            $localisation->setDepartement($this);
        }
        $this->localisations = $localisations;
    }

}