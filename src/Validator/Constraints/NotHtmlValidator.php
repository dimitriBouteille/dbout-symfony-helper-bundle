<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\{Constraint, ConstraintValidator};

/**
 * Class NotHtmlValidator
 *
 * @package Dbout\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class NotHtmlValidator extends ConstraintValidator
{

    /**
     * Function validate
     *
     * @param mixed $string
     * @param Constraint $constraint
     * @return void
     */
    public function validate($string, Constraint $constraint)
    {
        if($string != strip_tags($string)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

}
