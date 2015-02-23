<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Orm\Entity()
 * @UniqueEntity(fields = {"code"}, message = "duplicate commune")
 */
class Commune {

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=8, unique=true)
     */
    private $code;


    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nom;


    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Departement", inversedBy="communes", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="code")
     */
    protected $departement;

    
    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Region", inversedBy="communes", cascade={"all"})
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
        return $this->getNom();
    }


    public function getId() {
        return $this->id;
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


    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }


    public function getCodePostal() {
        return $this->code_postal;
    }

    public function setCodePostal($code_postal) {
        $this->code_postal = $code_postal;
    }

}