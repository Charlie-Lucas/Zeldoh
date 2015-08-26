<?php

namespace Zeldoh\AppBundle\Entity\Character;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Player extends Character
{
    /**
     * @ORM\OneToOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Coordinate")
     */
    private $coordinate;

    /**
     * Set coordinate
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Coordinate $coordinate
     * @return Player
     */
    public function setCoordinate(\Zeldoh\AppBundle\Entity\Map\Coordinate $coordinate = null)
    {
        $this->coordinate = $coordinate;

        return $this;
    }

    /**
     * Get coordinate
     *
     * @return \Zeldoh\AppBundle\Entity\Map\Coordinate 
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }
}
