<?php

namespace Zeldoh\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Zeldoh\AppBundle\Entity\Character\Player;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'map' => $this->get('zeldoh.map.loader')->import(),
            'player' => new Player()
        );
    }
}
