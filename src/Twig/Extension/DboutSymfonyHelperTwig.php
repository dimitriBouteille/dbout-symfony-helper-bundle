<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Twig\Extension;

use Dbout\Bundle\SymfonyHelperBundle\Helper\Routing\RoutingHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class DboutSymfonyHelperTwig
 * @package Dbout\Bundle\SymfonyHelperBundle\Twig\Extension
 */
class DboutSymfonyHelperTwig extends AbstractExtension
{

    /**
     * @var RoutingHelper
     */
    private $routingHelper;

    /**
     * DboutSymfonyHelperTwig constructor.
     * @param RoutingHelper $routingHelper
     */
    public function __construct(RoutingHelper $routingHelper)
    {
        $this->routingHelper = $routingHelper;
    }

    /**
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('isRoute', [$this, 'isRoute']),
        ];
    }

    /**
     * @param string $routeName
     * @return bool
     */
    public function isRoute(string $routeName): bool
    {
        return $this->routingHelper->isRoute($routeName);
    }

}