<?php

namespace Gredin\CantataBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class UserType
 */
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email')
            ->add('password', 'password')
            ->add('signup', 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
 