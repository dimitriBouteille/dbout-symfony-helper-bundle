<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Form\Type;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Trait FormTypeTrait
 * @package Dbout\Bundle\SymfonyHelperBundle\Form\Type
 */
trait FormTypeTrait
{

    /**
     * @param OptionsResolver $optionsResolver
     * @param string $optionName
     * @param array $value
     */
    public function mergeOptions(OptionsResolver $optionsResolver, string $optionName, array $value): void
    {
        $optionsResolver->setNormalizer($optionName, function (Options $options, $currentValue) use($value) {


            return array_merge($currentValue, $value);
        });
    }

}