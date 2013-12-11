<?php

namespace wbx\CommunesDeFranceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Orm\Entity()
 * @UniqueEntity(fields = {"code"}, message = "duplicate postal code")
 */
class CodePostal {

    /**
     * @ORM\Column(type="string", length=8, unique=true)
     * @ORM\Id
     */
    protected $code;


    /**
     * @ORM\OneToMany(targetEntity="wbx\CommunesDeFranceBundle\Entity\Localisation", mappedBy="code_postal", cascade={"all"})
     */
    protected $localisations;


    /**
     *  Constructor
     */
    public function __construct() {
        $this->localisations = new ArrayCollection();
    }


    public function __toString() {
        return $this->getCode();
    }


    public function getCode() {
        return $this->code;
    }


    public function addLocalisation(Localisation $localisation) {
        $localisation->setCodePostal($this);
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
            $localisation->setCodePostal($this);
        }
        $this->localisations = $localisations;
    }


}