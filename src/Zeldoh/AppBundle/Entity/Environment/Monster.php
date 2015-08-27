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
     * @ORM\ManyToMany(targetEntity="Zeldoh\AppBundle\Entity\Ability\Power",
     */
    
    
    /**
     * @var boolean
     */
    private $item;


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
     * Set item
     *
     * @param string $item
     * @return Monster
     */
    public function setItem($item)
    {
        $this->name = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return boolean
     */
    public function getItem()
    {
        return $this->item;
    }
}
