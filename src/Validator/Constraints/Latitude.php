<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Latitude
 *
 * @Annotation
 * @link https://stackoverflow.com/questions/15965166/what-is-the-maximum-length-of-latitude-and-longitude
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class Latitude extends Constraint
{

    /**
     * @var string
     */
    public $message = 'La latitude doit être comprise entre {{min}} et {{max}} degré.';

    /**
     * @var int
     */
    public $min = -90;

    /**
     * @var int
     */
    public $max = 90;

}
