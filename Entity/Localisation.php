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
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\CodePostal")
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $code_postal;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Commune")
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $commune;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Departement")
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $departement;

    
    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Region")
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


    public function getFullname() {
        $str = "";

        if ($this->commune !== null) {
            $str = $this->getCodePostalNom() . " " . $this->getCommuneNom();
        }
        else if ($this->departement !== null) {
            $str = $this->getDepartementNom()  . " (département)";
        }
        else if ($this->region !== null) {
            $str = $this->getRegionNom()  . " (région)";
        }

        return $str;
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