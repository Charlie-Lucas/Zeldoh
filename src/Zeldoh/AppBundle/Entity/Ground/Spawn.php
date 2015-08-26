<?php

namespace Zeldoh\AppBundle\Entity\Ground;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spawn
 *
 * @ORM\Entity
 */
class Spawn extends Ground
{
    /**
     * @ORM\OneToOne(targetEntity="Zeldoh\AppBundle\Entity\Character\Player")
     */
    private $player;

    

    /**
     * Set player
     *
     * @param \Zeldoh\AppBundle\Entity\Character\Player $player
     * @return Spawn
     */
    public function setPlayer(\Zeldoh\AppBundle\Entity\Character\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Zeldoh\AppBundle\Entity\Character\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
