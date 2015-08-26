<?php

use Zeldoh\AppBundle\Entity\Environment\Monster;
use Zeldoh\AppBundle\Entity\Map\Map;

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
        
        return $monster;
    }
    
    /*
     * this one fetch coodinates from Entity Map
     */
    public function fetchCoordinates(Map $map){ //coord total
        $map->getCoordinates();
    }
    
    public function spawnMonster() {
         //coordinates : if ground = land, generateMonster (random).
        //if ground != land, do not
    }

}
