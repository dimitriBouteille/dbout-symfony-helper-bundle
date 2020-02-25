<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PasswordPreview
 * @package Dbout\Bundle\SymfonyHelperBundle\Form\Type
 */
class PasswordPreview extends PasswordType
{
    use FormTypeTrait;

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'always_empty' => true,
        ]);
        $this->mergeOptions($resolver, 'attr', [
            'is' => 'password-preview',
        ]);
    }

}