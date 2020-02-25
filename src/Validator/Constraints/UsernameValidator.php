<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\{Constraint, ConstraintValidator};

/**
 * Class UsernameValidator
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class UsernameValidator extends ConstraintValidator
{

    /**
     * Function validate
     *
     * @param mixed $value
     * @param Constraint $constraint
     * @return void
     */
    public function validate($value, Constraint $constraint)
    {
        $regex = sprintf('#^[a-zA-Z0-9_]{%s,%s}$#', $constraint->min, $constraint->max);

        if(!preg_match($regex, $value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

}
