<?php

namespace Zeldoh\AppBundle\Form\Character;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlayerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'choice', array(
                'choices' => array(
                    "zeldohapp/images/perso-1.png" => 'Vert' ,
                    "zeldohapp/images/perso-2.png" => 'Blanc',
                    "zeldohapp/images/perso-3.png" => 'Bleu',
                    "zeldohapp/images/perso-4.png" => 'Rouge'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeldoh\AppBundle\Entity\Character\Player'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeldoh_appbundle_character_player';
    }
}
