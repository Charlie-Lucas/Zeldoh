<?php

namespace Zeldoh\AppBundle\Entity\Character;

use Doctrine\ORM\Mapping as ORM;

/**
 * Character
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Character
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
