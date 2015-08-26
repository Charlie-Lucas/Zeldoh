<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Type;

/**
 * AreaLine
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AreaLine
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
     * @Type("ArrayCollection<Zeldoh\AppBundle\Entity\Map\Area>")
     * @ORM\OneToMany(targetEntity="Zeldoh\AppBundle\Entity\Map\Area", mappedBy="areaLine")
     */
    private $areas;

    /**
     *
     * @ORM\ManytoOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Map", inversedBy="areaLines")
     */
    private $map;

    public function __construct()
    {
        $this->areas= new ArrayCollection();
    }

    /**
     * Add areas
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $area
     * @return AreaLine
     */
    public function addArea(\Zeldoh\AppBundle\Entity\Map\Area $area)
    {
        $this->areas[] = $area;
        $area->setAreaLine($this);

        return $this;
    }

    /**
     * Remove areas
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $areas
     */
    public function removeArea(\Zeldoh\AppBundle\Entity\Map\Area $areas)
    {
        $this->areas->removeElement($areas);
    }

    /**
     * Get areas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAreas()
    {
        return $this->areas;
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
     * Set map
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Map $map
     * @return AreaLine
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
}
