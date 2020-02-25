<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\{Constraint, ConstraintValidator};

/**
 * Class PhoneValidator
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class PhoneValidator extends ConstraintValidator
{

    /**
     * Function validate
     *
     * @param mixed $phone
     * @param Constraint $constraint
     * @return void
     */
    public function validate($phone, Constraint $constraint)
    {
        $separators = null;
        if(!empty($constraint->separators)){
            $separators = '['.$constraint->separators.']?';
        }

        $regex = '#^0[0-9]('.$separators.'[0-9]{2}){4}$#';

        if(!empty($phone) && !preg_match($regex, $phone)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{phone}}', $phone)
                ->addViolation();
        }
    }

}