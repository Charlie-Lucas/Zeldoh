<?php

namespace Zeldoh\AppBundle\Service;
use Zeldoh\AppBundle\Entity\Environment\Monster;
use Zeldoh\AppBundle\Entity\Map\Area;
use Zeldoh\AppBundle\Entity\Map\Map;
use Zeldoh\AppBundle\Entity\Ground\Land;

class MonsterManager {

//une function generate monster
//une function spawn
//une function random : return true/false
//if instanceof land, random(generateMOnster)
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

    public function generateMonsterForArea(Area $area)
    {
        $nbMonster = rand(30, 30);
        for($i = 0; $i < $nbMonster; $i++)
        {
            $area->addMonster($this->generateMonster());
        }
    }
    public function spawnMonster(Map $map)
    {
        //coordinates : if ground = land, generateMonster (random).
        //if ground != land, do not

        $areaLines = $map->getAreaLines();
        foreach($areaLines as $areaLine)
        {
            foreach ($areaLine->getAreas() as $area) {
                $this->generateMonsterForArea($area);
            }

        }
        return $map;
    }
    
    /*public function randomBool(){
        $rand = (bool)mt_rand(0,1);
        
        return $rand;
    }*/

}

