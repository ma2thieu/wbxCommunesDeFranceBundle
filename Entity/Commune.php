<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Orm\MappedSuperclass
 * @UniqueEntity(fields = {"code", "departement", "region"}, message = "duplicate commune")
 */
class Commune {

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=3)
     */
    protected $code;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Departement", cascade={"all"})
     * @ORM\JoinColumn(name="departement_code", referencedColumnName="code")
     */
    protected $departement;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Region", cascade={"all"})
     * @ORM\JoinColumn(name="region_code", referencedColumnName="code")
     */
    protected $region;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $art_nom_maj;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nom_maj;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $art_nom_min;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nom_min;




    /**
     *  Constructor
     */
    public function __construct() {
        //
    }


    public function __toString() {
        return $this->getNomMin();
    }


    public function getFullNomMin() {
        return ($this->art_nom_min != "" ? $this->art_nom_min . " " : "") . $this->nom_min ;
    }

    public function getFullNomMaj() {
        return ($this->art_nom_maj != "" ? $this->art_nom_maj . " " : "") . $this->nom_maj ;
    }


    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
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


    public function getArtNomMaj() {
        return $this->art_nom_maj;
    }

    public function setArtNomMaj($art_nom_maj) {
        $this->art_nom_maj = $art_nom_maj;
    }


    public function getNomMaj() {
        return $this->nom_maj;
    }

    public function setNomMaj($nom_maj) {
        $this->nom_maj = $nom_maj;
    }


    public function getArtNomMin() {
        return $this->art_nom_min;
    }

    public function setArtNomMin($art_nom_min) {
        $this->art_nom_min = $art_nom_min;
    }


    public function getNomMin() {
        return $this->nom_min;
    }

    public function setNomMin($nom_min) {
        $this->nom_min = $nom_min;
    }

}