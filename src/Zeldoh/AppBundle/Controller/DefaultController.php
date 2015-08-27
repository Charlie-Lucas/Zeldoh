<?php

namespace Zeldoh\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Zeldoh\AppBundle\Entity\Character\Player;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        $map = $this->get('zeldoh.map.loader')->import();
        return array(
            'map' => $this->get('zeldoh.monster.manager')->spawnMonster($map),
            'player' => new Player()
        );
    }
}
