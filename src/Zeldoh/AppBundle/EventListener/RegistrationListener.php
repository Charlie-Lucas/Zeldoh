<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zeldoh\AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Zeldoh\AppBundle\Entity\Character\Player;

class RegistrationListener implements EventSubscriberInterface
{

    private $router;
    private $em;

    public function __construct($router, $em)
    {
        $this->router = $router;
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'redirectAfterRegistration',
            FOSUserEvents::REGISTRATION_COMPLETED => 'createAPlayer'
        );
    }

    public function redirectAfterRegistration(Event $event)
    {
        $url = $this->router->generate('homepage');
        $response = new RedirectResponse($url);
        $event->setResponse($response);
    }
    public function createAPlayer(FilterUserResponseEvent $event)
    {
        $user = $event->getUser();
        $player = new Player();
        //$this->em->persist($player);
        $user->setPlayer($player);
        $this->em->flush();
    }
}
