<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Orm\MappedSuperclass
 * @UniqueEntity(fields = {"code"}, message = "duplicate departement")
 */
class Departement {

    /**
     * @ORM\Column(name="code", type="string", length=3, unique=true)
     * @ORM\Id
     */
    protected $code;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @ORM\ManyToOne(targetEntity="wbx\CommunesDeFranceBundle\Entity\Region", cascade={"all"})
     * @ORM\JoinColumn(name="region_code", referencedColumnName="code")
     */
    protected $region;

    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Commune", mappedBy="departement", cascade={"all"})
     */
    protected $communes;


    /**
     *  Constructor
     */
    public function __construct() {
        $this->commmunes = new ArrayCollection();
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


    public function addCommmune(Commmune $commmune) {
        $commmune->setDepartement($this);
        $this->commmunes->add($commmune);
    }

    public function removeCommmune(Commmune $commmune) {
        $this->commmunes->removeElement($commmune);
    }

    public function getCommmunes() {
        return $this->commmunes;
    }

    public function setCommmunes(Collection $commmunes) {
        foreach ($commmunes as $commmune) {
            $commmune->setDepartement($this);
        }
        $this->commmunes = $commmunes;
    }

}