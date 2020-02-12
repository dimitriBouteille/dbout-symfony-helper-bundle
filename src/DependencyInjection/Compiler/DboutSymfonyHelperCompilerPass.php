<?php

namespace Dbout\Bundle\SymfonyHelperBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DboutSymfonyHelperCompilerPass
 * @package Dbout\Bundle\SymfonyHelperBundle\DependencyInjection\Compiler
 */
class DboutSymfonyHelperCompilerPass implements CompilerPassInterface
{

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
    }

}