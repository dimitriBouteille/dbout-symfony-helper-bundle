<?php

namespace Dbout\Bundle\SymfonyHelperBundle\DependencyInjection;

use Dbout\Bundle\SymfonyHelperBundle\Helper\Routing\RoutingHelper;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class DboutSymfonyHelperExtension
 * @package Dbout\Bundle\SymfonyHelperBundle\DependencyInjection
 */
class DboutSymfonyHelperExtension extends Extension
{

    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__. '/../Resources/config'));
        $loader->load('services.yml');
    }

}