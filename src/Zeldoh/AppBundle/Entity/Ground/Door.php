<?php

namespace Zeldoh\AppBundle\Entity\Ground;

use Doctrine\ORM\Mapping as ORM;

/**
 * Door
 *
 * @ORM\Entity
 */
class Door extends Ground
{

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked = true;

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return Ground:Door
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }
}