<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class UniqueEntity
 *
 * @Annotation
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class UniqueEntity extends Constraint
{

    /**
     * @var string
     */
    public $message = '';

}