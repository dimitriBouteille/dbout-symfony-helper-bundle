<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Helper\Form;

use Symfony\Component\Form\FormInterface;

/**
 * Class FormHelper
 * @package Dbout\Bundle\SymfonyHelperBundle\Helper\Form
 */
class FormHelper
{

    /**
     * @param FormInterface $form
     * @param bool $oneErrorByField
     * @return array
     */
    public static function errors(FormInterface $form, bool $oneErrorByField = true): array
    {
        $errors = [];

        foreach ($form as $fieldName => $field) {
            foreach ($form[$fieldName]->getErrors() as $error) {

                if($oneErrorByField) {
                    $errors[$fieldName] = $error->getMessage();
                    break;
                } else {
                    $errors[$fieldName][] = $error->getMessage();
                }
            }
        }

        return $errors;
    }

}