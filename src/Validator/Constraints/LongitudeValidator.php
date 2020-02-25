<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\{Constraint, ConstraintValidator};

/**
 * Class LongitudeValidator
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class LongitudeValidator extends ConstraintValidator
{

    /**
     * Function validate
     *
     * @param mixed $longitude
     * @param Constraint $constraint
     * @return void
     */
    public function validate($longitude, Constraint $constraint)
    {
        if($longitude < $constraint->min || $longitude > $constraint->max) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{min}}', $constraint->min)
                ->setParameter('{{max}}', $constraint->max)
                ->addViolation();
        }
    }

}
