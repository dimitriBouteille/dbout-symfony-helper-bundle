<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class NotHtml
 *
 * @Annotation
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class Password extends Constraint
{

    /**
     * Minimum password size
     * @var null|int
     */
    public $minLength = 8;

    /**
     * Maximum password size
     * @var null|int
     */
    public $maxLength = null;

    /**
     * Minimum number of digits the password must contain to be valid
     * @var null|int
     */
    public $minNumber = 2;

    /**
     * Maximum number of digits the password must contain to be valid
     * @var null|int
     */
    public $maxNumber = null;

    /**
     * @var string
     */
    public $message = 'Le mot de passe ne respect pas le bon format.';

}