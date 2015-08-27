<?php

use Zeldoh\AppBundle\Entity\Environment\Monster;
use Zeldoh\AppBundle\Entity\Map\Map;
use Zeldoh\AppBundle\Entity\Ground\Land;

class MonsterManager {

//function coordinates
//spawnmonster
//getMonster
//generateMonster

    /*
     * this function generate a monster (a boss bwahaha)
     */
    public function generateMonster() {
        $monster = new Monster();
        $monster->setName('Ganon');
        $monster->setLife(100);
        $monster->setDamage(1000);
    }

    public function spawnMonster(Map $map) {
        //coordinates : if ground = land, generateMonster (random).
        //if ground != land, do not
        $coordinates = $map->getCoordinates();

        foreach ($coordinates as $coord) {
            if ($coord instanceof Land) {
                $this->generateMonster();
            }
        }
    }

}
