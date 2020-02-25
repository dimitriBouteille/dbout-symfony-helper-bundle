<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Phone
 *
 * @Annotation
 *
 * @package Dbout\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class Phone extends Constraint
{

    /**
     * @var string
     */
    public $message = 'Le numéro n\'est pas valide.';

    /**
     * @var string
     * @example
     * 00.00.00.00.00
     * 00 00 00 00 00
     * 00-00-00-00-00
     */
    public $separators = ' .-';

}
