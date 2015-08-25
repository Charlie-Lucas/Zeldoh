<?php

namespace Zeldoh\AppBundle\Service;


use Zeldoh\AppBundle\Entity\Ground\Wall;
use Zeldoh\AppBundle\Entity\Ground\Land;
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
                        if(array_key_exists($i*16 +$ii, $parsedLines) && array_key_exists(($j*16 + $jj), str_split($parsedLines[$i*16 +$ii])))
                        {
                            $coordinate->setGround($this->findGround(str_split($parsedLines[$i*16 +$ii])[$j*16 +$jj]));
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




//        var $map = new Map();
//        var_dump($map);
        $parsedString = array();

//        for($i = 0; $i < sizeof($data); $i++)
//        {

//            if($j == O)
//            {
//                $area = new Area();
//            }
//            if($data[$i] == "\n"){
//                $j = 0;
//            }else{
//                $coordinate = new Coordinate();
//                switch ($data[i]) {
//                    case '#':
//                        echo "i égal 0";
//                        break;
//                    default:
//                        break;
//                }
//                if($j = 15)
//                {
//                    $j = 0;
//                }
//            }
//        }
        dump($map);
        return $map;
    }
    public function findGround($character = "#")
    {
        switch ($character) {
            case "#":
                $wall = new Wall();
                $wall->setBackground('black');
                return $wall;
                break;
            case "-":
                $land = new Land();
                $land->setBackground('grey');
                return $land;
                break;
//                case "K":
//                    echo "i est un gateau";
//                    break;
//                case "Y":
//                    echo "i est un gateau";
//                    break;
//                case "X":
//                    echo "i est un gateau";
//                    break;
//                case "B":
//                    echo "i est un gateau";
//                    break;
//                case "D":
//                    echo "i est un gateau";
//                    break;
            default:
                $wall = new Land();
                $wall->setBackground('red');
                return $wall;
                break;
        }
        return $map;
    }
}