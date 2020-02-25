<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints;

use Symfony\Component\Validator\{Constraint, ConstraintValidator};
use Doctrine\ORM\EntityManager;

/**
 * Class UniqueEntityValidator
 *
 * @package Dbout\Bundle\SymfonyHelperBundle\Validator\Constraints
 *
 * @author      Dimitri BOUTEILLE <bonjour@dimitri-bouteille.fr>
 * @link        https://github.com/dimitriBouteille Github
 * @copyright   (c) 2019 Dimitri BOUTEILLE
 */
class UniqueEntityValidator extends ConstraintValidator
{

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * UniqueEntityValidator constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->em = $manager;
    }

    /**
     * Function validate
     *
     * @param mixed $value
     * @param Constraint $constraint
     * @return void
     */
    public function validate($value, Constraint $constraint)
    {
        $repository = $this->em->getRepository($this->context->getClassName());

        $search = $repository->findOneBy([
            $this->context->getPropertyName() => $value
        ]);

        $currentObjectId = $this->context->getObject()->getId();
        if(!is_null($search) && (is_null($currentObjectId) || $currentObjectId != $search->getId())) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

}
