<?php
namespace Zeldoh\AppBundle\Twig;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Routing\Router;
use Zeldoh\AppBundle\Entity\Ground\Door;
use Zeldoh\AppBundle\Entity\Ground\Ground;
use Zeldoh\AppBundle\Entity\Ground\Land;
use Zeldoh\AppBundle\Entity\Ground\Spawn;
use Zeldoh\AppBundle\Entity\Ground\Wall;

class GroundExtension extends \Twig_Extension
{
    private $router;
    private $environment;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * register twig functions
     */
    public function getFunctions()
    {
        return array(
            'displayGround' => new \Twig_Function_Method($this, 'displayGround', array('is_safe' => array('html'))),
        );
    }

    public function displayGround(Ground $ground, $coordinate = array())
    {
        if($ground instanceof Door)
        {
            $template = 'ZeldohAppBundle:Ground:door.html.twig';
        }elseif($ground instanceof Land)
        {
            $template = 'ZeldohAppBundle:Ground:land.html.twig';
        }elseif($ground instanceof Wall)
        {
            $template = 'ZeldohAppBundle:Ground:wall.html.twig';
        }elseif($ground instanceof Spawn)
        {
            $template = 'ZeldohAppBundle:Ground:spawn.html.twig';
        }else{
            throw new \Exception('Use A valid GroundObject');
        }
        return $this->environment->render($template,
            array(
                'ground' => $ground,
                'x' => $coordinate['areaRow'] * 16 + $coordinate['coordinateRow'],
                'y' => $coordinate['areaColumn'] * 16 + $coordinate['coordinateColumn'],
            )
        );

    }

    public function getName()
    {
        return 'ground_extension';
    }
}
