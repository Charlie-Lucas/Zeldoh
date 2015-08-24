<?php

namespace Zeldoh\AppBundle\Entity\Ground;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ground
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\Table()
 * @ORM\Entity
 */
abstract class Ground
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
     * @var boolean
     *
     * @ORM\Column(name="reachable", type="boolean")
     */
    private $reachable;


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
     * Set reachable
     *
     * @param boolean $reachable
     * @return Ground:Field
     */
    public function setReachable($reachable)
    {
        $this->reachable = $reachable;

        return $this;
    }

    /**
     * Get reachable
     *
     * @return boolean
     */
    public function getReachable()
    {
        return $this->reachable;
    }

}