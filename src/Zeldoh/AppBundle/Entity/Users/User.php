<?php

namespace Zeldoh\AppBundle\Entity\Users;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Zeldoh\AppBundle\Entity\Character\Player;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Zeldoh\AppBundle\Entity\Character\Player", cascade={"persist"})
     */
    private $player;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set player
     *
     * @param \Zeldoh\AppBundle\Entity\Character\Player $player
     * @return User
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
