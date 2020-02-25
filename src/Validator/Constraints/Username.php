<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Username
 *
 * @Annotation
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class Username extends Constraint
{

    /**
     * @var string
     */
    public $message = 'Le pseudo n\'est pas valide';

    /**
     * @var int
     */
    public $min = 3;

    /**
     * @var int
     */
    public $max = 25;

}