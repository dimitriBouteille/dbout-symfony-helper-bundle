<?php

namespace Dbout\Bundle\SymfonyHelperBundle;

use Dbout\Bundle\SymfonyHelperBundle\DependencyInjection\Compiler\DboutSymfonyHelperCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class DboutSymfonyHelperBundle
 * @package Dbout\Bundle\SymfonyHelperBundle
 */
final class DboutSymfonyHelperBundle extends Bundle
{

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new DboutSymfonyHelperCompilerPass());
    }

}