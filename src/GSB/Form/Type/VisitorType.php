<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class VisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => "Nom d'utilisateur",
            ))
            ->add('password', 'password', array(
                'label' => 'Mot de passe',
            ))
            ->add('save', 'submit', array(
                'label' => 'Mettre à jour',
            ));
    }

    public function getName()
    {
        return 'visitor';
    }
}
