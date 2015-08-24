<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Area", inversedBy="coordinates")
     */
    private $area;

    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer")
     */
    private $x;

    /**
     * @var integer
     *
     * @ORM\Column(name="y", type="integer")
     */
    private $y;


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
     * Set x
     *
     * @param integer $x
     * @return Map:Coordinate
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param integer $y
     * @return Map:Coordinate
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return integer
     */
    public function getY()
    {
        return $this->y;
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
}
