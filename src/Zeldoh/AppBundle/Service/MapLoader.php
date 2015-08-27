<?php

namespace Zeldoh\AppBundle\Service;


use Zeldoh\AppBundle\Entity\Ground\Spawn;
use Zeldoh\AppBundle\Entity\Ground\Wall;
use Zeldoh\AppBundle\Entity\Ground\Land;
use Zeldoh\AppBundle\Entity\Ground\Browncave;
use Zeldoh\AppBundle\Entity\Ground\Water;
use Zeldoh\AppBundle\Entity\Ground\Grass;
use Zeldoh\AppBundle\Entity\Ground\Door;
use Zeldoh\AppBundle\Entity\Ground\Key;
use Zeldoh\AppBundle\Entity\Ground\Boss;
use Zeldoh\AppBundle\Entity\Map\Area;
use Zeldoh\AppBundle\Entity\Map\AreaLine;
use Zeldoh\AppBundle\Entity\Map\Coordinate;
use Zeldoh\AppBundle\Entity\Map\CoordinateLine;
use Zeldoh\AppBundle\Entity\Map\Map;

class MapLoader
{
    public function import()
    {
        $file = file_get_contents(__DIR__.'/../Resources/public/images/map.txt');
        return($this->parse($file));
    }

    public function parse($string)
    {
        $map = new Map();
        $parsedLines = explode("\n", $string);
        $lineNumber = sizeof($parsedLines);
        $maxString = 0;
        foreach ($parsedLines as $index => $line) {
            if(strlen($line) > $maxString)
            {
                $maxString = strlen($line);
            }

        }

        $horizontalAreaNumber = $maxString % 16 == 0 ? $maxString / 16 : ($maxString - $maxString % 16) / 16 + 1;
        $verticalAreaNumber = $lineNumber % 16 == 0 ? $lineNumber / 16 : ($lineNumber - $lineNumber % 16) / 16 + 1;
        $zoneNumber =$verticalAreaNumber*$horizontalAreaNumber;

        for($i = 0; $i < $verticalAreaNumber; $i++)
        {
            $areaLine = new AreaLine();
            for($j = 0; $j < $horizontalAreaNumber; $j++)
            {
                $area = new Area();
                for($ii = 0; $ii < 16; $ii ++)
                {
                    $coordinateLine = new CoordinateLine();
                    for($jj = 0; $jj < 16; $jj++)
                    {
                        $x = $i*16 +$ii;
                        $y = $j*16 +$jj;
                        $coordinate = new Coordinate();
                        if(array_key_exists($i*16 +$ii, $parsedLines) && array_key_exists(($y), str_split($parsedLines[$x])))
                        {
                            $coordinate->setGround($this->findGround(str_split($parsedLines[$x])[$y]));
                        }else{
                            $coordinate->setGround($this->findGround("#"));
                        }
                        $coordinateLine->addCoordinate($coordinate);
                    }
                    $area->addCoordinateLine($coordinateLine);
                }

                $areaLine->addArea($area);
            }
            $map->addAreaLine($areaLine);
        }
        return $map;
    }
    public function findGround($character = "#")
    {
        switch ($character) {
            case "#":
                $wall = new Wall();
                $wall->setBackground('bundles/zeldohapp/images/wall.png');
                return $wall;
                break;
            case "-":
                $land = new Land();
                $land->setBackground('bundles/zeldohapp/images/marsh.png');
                return $land;
                break;
            case "+":
                $browncave = new Browncave();
                $browncave->setBackground('bundles/zeldohapp/images/ss_browncave.png');
                return $browncave;
                break;
            case "*":
                $grass = new Grass();
                $grass->setBackground('bundles/zeldohapp/images/dark_grass.jpg');
                return $grass;
                break;
            case ",":
                $water = new Water();
                $water->setBackground('bundles/zeldohapp/images/water.jpg');
                return $water;
                break;
            case "X":
                $spawn = new Spawn();
                $spawn->setBackground('bundles/zeldohapp/images/marsh.png');
                return $spawn;
                break;
//                case "Y":
//                    echo "i est un gateau";
//                    break;
//                case "X":
//                    echo "i est un gateau";
//                    break;
            case "B":
                $boss = new Boss();
                $boss->setBackground('bundles/zeldohapp/images/boss.png');
                return $boss;
                break;
            case "D":
                $door = new Door();
                $door->setBackground('bundles/zeldohapp/images/door.png');
                return $door;
                break;
            case "K":
                $key = new Key();
                $key->setBackground('bundles/zeldohapp/images/key.png');
                return $key;
                break;
            default:
                $wall = new Land();
                $wall->setBackground('red');
                return $wall;
                break;
        }
    }
}