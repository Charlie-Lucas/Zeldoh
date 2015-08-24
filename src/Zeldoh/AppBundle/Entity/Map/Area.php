<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Area
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     *
     * @ORM\ManytoOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Map", inversedBy="areas")
     */
    private $map;

    /**
     * @ORM\OneToMany(targetEntity="Zeldoh\AppBundle\Entity\Map\Coordinate", mappedBy="area")
     */
    private $coordinates;

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
     * Set type
     *
     * @param string $type
     * @return Map:Area
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set map
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Map $map
     * @return Area
     */
    public function setMap(\Zeldoh\AppBundle\Entity\Map\Map $map = null)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Get map
     *
     * @return \Zeldoh\AppBundle\Entity\Map\Map 
     */
    public function getMap()
    {
        return $this->map;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coordinates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add coordinates
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Coordinate $coordinates
     * @return Area
     */
    public function addCoordinate(\Zeldoh\AppBundle\Entity\Map\Coordinate $coordinates)
    {
        $this->coordinates[] = $coordinates;

        return $this;
    }

    /**
     * Remove coordinates
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Coordinate $coordinates
     */
    public function removeCoordinate(\Zeldoh\AppBundle\Entity\Map\Coordinate $coordinates)
    {
        $this->coordinates->removeElement($coordinates);
    }

    /**
     * Get coordinates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }
}
