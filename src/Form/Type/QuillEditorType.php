<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class QuillEditorType
 * https://quilljs.com/docs/quickstart/
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Form\Type
 */
class QuillEditorType extends TextareaType
{

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        // Toolbar modules : https://quilljs.com/docs/modules/toolbar/#container
        // https://quilljs.com/docs/modules/toolbar/
        $resolver->setDefault('toolbar-modules', ['bold', 'italic', 'underline', 'strike'])
            ->setAllowedTypes('toolbar-modules', 'string[]');

        // Theme : https://quilljs.com/docs/themes/
        $resolver->setDefault('theme', 'snow')
            ->setAllowedTypes('theme', 'string');

        $resolver->setNormalizer('attr', function (Options $options, $value) {
            return array_merge($value, [
                'is' =>                 'quill-editor',
                'toolbar-modules' =>    json_encode($options['toolbar-modules']),
                'theme' =>              $options['theme'],
            ]);
        });
    }

}