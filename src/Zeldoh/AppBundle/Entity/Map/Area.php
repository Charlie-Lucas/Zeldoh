<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

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
     * @ORM\ManytoOne(targetEntity="Zeldoh\AppBundle\Entity\Map\AreaLine", inversedBy="areas")
     */
    private $areaLine;

    /**
     * @Type("ArrayCollection<Zeldoh\AppBundle\Entity\Map\CoordinateLine>")
     * @ORM\OneToMany(targetEntity="Zeldoh\AppBundle\Entity\Map\CoordinateLine", mappedBy="area")
     */
    private $coordinateLines;

    public function __construct()
    {
        $this->coordinateLines= new ArrayCollection();
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
     * @param \Zeldoh\AppBundle\Entity\Map\AreaLine $areaLine
     * @return Area
     */
    public function setAreaLine(\Zeldoh\AppBundle\Entity\Map\AreaLine $areaLine = null)
    {
        $this->areaLine = $areaLine;

        return $this;
    }

    /**
     * Get map
     *
     * @return \Zeldoh\AppBundle\Entity\Map\AreaLine
     */
    public function getAreaLine()
    {
        return $this->areaLine;
    }

    /**
     * Add coordinateLines
     *
     * @param \Zeldoh\AppBundle\Entity\Map\CoordinateLine $coordinateLines
     * @return Area
     */
    public function addCoordinateLine(\Zeldoh\AppBundle\Entity\Map\CoordinateLine $coordinateLines)
    {
        $this->coordinateLines[] = $coordinateLines;
        $coordinateLines->setArea($this);

        return $this;
    }

    /**
     * Remove coordinateLines
     *
     * @param \Zeldoh\AppBundle\Entity\Map\CoordinateLine $coordinateLines
     */
    public function removeCoordinateLine(\Zeldoh\AppBundle\Entity\Map\CoordinateLine $coordinateLines)
    {
        $this->coordinateLines->removeElement($coordinateLines);
    }

    /**
     * Get coordinateLines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoordinateLines()
    {
        return $this->coordinateLines;
    }
}
