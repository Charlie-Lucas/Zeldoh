<?php

namespace Zeldoh\AppBundle\Entity\Environment;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monster
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Monster
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="life", type="integer")
     */
    private $life;

    /**
     * @var integer
     *
     * @ORM\Column(name="damage", type="integer")
     */
    private $damage;

    /**
     * @ORM\ManyToOne(targetEntity="Zeldoh\AppBundle\Entity\Map\Area", inversedBy="monsters")
     */
    private $area;

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
     * Set name
     *
     * @param string $name
     * @return Monster
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set life
     *
     * @param integer $life
     * @return Monster
     */
    public function setLife($life)
    {
        $this->life = $life;

        return $this;
    }

    /**
     * Get life
     *
     * @return integer 
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set damage
     *
     * @param integer $damage
     * @return Monster
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get damage
     *
     * @return integer 
     */
    public function getDamage()
    {
        return $this->damage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->areas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add areas
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $areas
     * @return Monster
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

    /**
     * Set area
     *
     * @param \Zeldoh\AppBundle\Entity\Map\Area $area
     * @return Monster
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
