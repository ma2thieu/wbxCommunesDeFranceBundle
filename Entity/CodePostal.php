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
     *  Constructor
     */
    public function __construct() {
        //
    }


    public function __toString() {
        return $this->getCode();
    }


    public function getCode() {
        return $this->code;
    }


}