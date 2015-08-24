<?php

namespace Zeldoh\AppBundle\Entity\Map;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Map
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
     * @ORM\OneToMany(targetEntity="Zeldoh\AppBundle\Entity\Map\Area", mappedBy="map")
     */
    private $areas;

    public function __construct()
    {
        $this->areas= new ArrayCollection();
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
     * Add areas
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $areas
     * @return Map
     */
    public function addArea(\Zeldoh\AppBundle\Entity\Map\Area $areas)
    {
        $this->areas[] = $areas;

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
}
