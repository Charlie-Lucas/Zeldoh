<?php

namespace Zeldoh\AppBundle\Entity\Map;

use JMS\Serializer\Annotation\Type;
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
     * @Type("ArrayCollection<Zeldoh\AppBundle\Entity\Map\AreaLine>")
     * @ORM\OneToMany(targetEntity="Zeldoh\AppBundle\Entity\Map\AreaLine", mappedBy="map")
     */
    private $areaLines;

    public function __construct()
    {
        $this->areaLines= new ArrayCollection();
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
     * @param \Zeldoh\AppBundle\Entity\Map\AreaLine $areaLine
     * @return Map
     */
    public function addAreaLine(\Zeldoh\AppBundle\Entity\Map\AreaLine $areaLine)
    {
        $this->areaLines[] = $areaLine;
        $areaLine->setMap($this);

        return $areaLine;
    }

    /**
     * Remove areas
     *
     * @param \Zeldoh\AppBundle\Entity\Map\AreaLine $areaLine
     */
    public function removeAreaLine(\Zeldoh\AppBundle\Entity\Map\AreaLine $areaLine)
    {
        $this->areaLines->removeElement($areaLine);
    }

    /**
     * Get areas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAreaLines()
    {
        return $this->areaLines;
    }
    
    /*
     * this function returns coordinates from areas
     */
    public function getCoordinates(){
        $coordinates = array();
        
        foreach ($this->areaLines as $areas){
            foreach ($areas->getAreaLines() as $coordarea){
                $coordinates[] = $coordarea;
            }
        }
        return $coordinates;
    }
}
