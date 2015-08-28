<?php

namespace Zeldoh\AppBundle\Form\User;

use FOS\UserBundle\Form\Type\ProfileFormType AS BaseProfileFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Zeldoh\AppBundle\Form\Character\PlayerType;

class ProfileFormType extends BaseProfileFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('player', new PlayerType());
    }

    public function getName()
    {
        return 'zeldoh_profile';
    }
}
