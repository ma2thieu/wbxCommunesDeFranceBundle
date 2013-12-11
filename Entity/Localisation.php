<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Orm\MappedSuperclass()
 */
class Localisation {

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\CodePostal", inversedBy="localisations", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $code_postal;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Commune", inversedBy="localisations", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $commune;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Departement", inversedBy="localisations", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $departement;

    
    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Region", inversedBy="localisations", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $region;


    /**
     *  Constructor
     */
    public function __construct() {
        //
    }


    public function __toString() {
        return $this->getCode();
    }


    public function getId() {
    	return $this->id;
    }


    public function getCodePostal() {
        return $this->code_postal;
    }

    public function setCodePostal($code_postal) {
        $this->code_postal = $code_postal;
    }


    public function getCommune() {
        return $this->commune;
    }

    public function setCommune($commune) {
        $this->commune = $commune;
    }


    public function getDepartement() {
        return $this->departement;
    }

    public function setDepartement($departement) {
        $this->departement = $departement;
    }


    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }


    public function getCodePostalNom() {
        return $this->getCodePostal() ? $this->getCodePostal()->getCode() : "";
    }

    public function getCommuneNom() {
        return $this->getCommune() ? $this->getCommune()->getNom() : "";
    }

    public function getDepartementNom() {
        return $this->getDepartement() ? $this->getDepartement()->getNom() : "";
    }

    public function getRegionNom() {
        return $this->getRegion() ? $this->getRegion()->getNom() : "";
    }

}