<?php

use Zeldoh\AppBundle\Entity\Environment\Monster;
use Zeldoh\AppBundle\Entity\Map\Map;

class MonsterManager{
    
    
    
    public function spawnMonster(Map $map){
        $map->getCoordinates(); //on va chercher les coordonnees de la map
        //setMonster
       // $monster->setMonster();
    }
}