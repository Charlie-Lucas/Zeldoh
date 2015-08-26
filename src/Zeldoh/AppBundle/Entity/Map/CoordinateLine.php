<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

/**
 * CoordinateLine
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CoordinateLine
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
     * @ORM\ManyToOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Area", inversedBy="coordinateLines")
     */
    private $area;

    /**
     * @Type("ArrayCollection<Zeldoh\AppBundle\Entity\Map\Coordinate>")
     * @ORM\OneToMany(targetEntity="Zeldoh\AppBundle\Entity\Map\Coordinate", mappedBy="coordinateLine")
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
     * Constructor
     */
    public function __construct()
    {
        $this->coordinates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set area
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $area
     * @return CoordinateLine
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
     * Add coordinates
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Coordinate $coordinates
     * @return CoordinateLine
     */
    public function addCoordinate(\Zeldoh\AppBundle\Entity\Map\Coordinate $coordinates)
    {
        $this->coordinates[] = $coordinates;
        $coordinates->setCoordinateLine($this);

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
