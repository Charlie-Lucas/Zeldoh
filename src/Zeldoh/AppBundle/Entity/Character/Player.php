<?php

namespace Zeldoh\AppBundle\Entity\Character;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Entity
 * @ORM\Table()
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\Column(name="image", type="string")
     *
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Coordinate")
     */
    private $coordinate;

    public function __construct()
    {
        $this->image = "zeldohapp/images/perso-4.png";
    }

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

    /**
     * Set image
     *
     * @param string $image
     * @return Player
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set player
     *
     * @param \Zeldoh\AppBundle\Entity\Users\User $player
     * @return Player
     */
    public function setUser(\Zeldoh\AppBundle\Entity\Users\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Zeldoh\AppBundle\Entity\Users\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
