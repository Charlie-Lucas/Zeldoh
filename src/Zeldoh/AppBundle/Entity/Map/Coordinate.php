<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

/**
 * Coordinate
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Coordinate
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
     * @ORM\ManyToOne(targetEntity="Zeldoh\AppBundle\Entity\Map\CoordinateLine", inversedBy="coordinates")
     */
    private $coordinateLine;

    /**
     * @ORM\OneToOne(targetEntity="Zeldoh\AppBundle\Entity\Ground\Ground")
     */
    private $ground;


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
     * Set area
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $area
     * @return Coordinate
     */
    public function setArea(\Zeldoh\AppBundle\Entity\Map\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \Zeldoh\AppBundle\Entity\Map\Area 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set coordinateLine
     *
     * @param \Zeldoh\AppBundle\Entity\Map\CoordinateLine $coordinateLine
     * @return Coordinate
     */
    public function setCoordinateLine(\Zeldoh\AppBundle\Entity\Map\CoordinateLine $coordinateLine = null)
    {
        $this->coordinateLine = $coordinateLine;

        return $this;
    }

    /**
     * Get coordinateLine
     *
     * @return \Zeldoh\AppBundle\Entity\Map\CoordinateLine 
     */
    public function getCoordinateLine()
    {
        return $this->coordinateLine;
    }

    /**
     * Set ground
     *
     * @param \Zeldoh\AppBundle\Entity\Ground\Ground $ground
     * @return Coordinate
     */
    public function setGround(\Zeldoh\AppBundle\Entity\Ground\Ground $ground = null)
    {
        $this->ground = $ground;

        return $this;
    }

    /**
     * Get ground
     *
     * @return \Zeldoh\AppBundle\Entity\Ground\Ground 
     */
    public function getGround()
    {
        return $this->ground;
    }
}
