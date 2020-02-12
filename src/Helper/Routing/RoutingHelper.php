<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Helper\Routing;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class RoutingHelper
 * @package Dbout\Bundle\SymfonyHelperBundle\Helper\Routing
 */
class RoutingHelper
{

    /**
     * @var \Symfony\Component\HttpFoundation\Request|null
     */
    protected $requestStack;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * RoutingHelper constructor.
     * @param RequestStack $requestStack
     * @param RouterInterface $router
     */
    public function __construct(RequestStack $requestStack, RouterInterface $router)
    {
        $this->requestStack = $requestStack;
        $this->router = $router;
    }

    /**
     * @param string $routeName
     * @return bool
     */
    public function isRoute(string $routeName): bool
    {
        $request = $this->requestStack->getCurrentRequest();
        if(!$request && empty($routeName)) {
            return false;
        }

        return $request->get('_route') === $routeName;
    }

    /**
     * @return string|null
     */
    public function getCurrentUrl(): ?string
    {
        $request = $this->requestStack->getCurrentRequest();
        if(!$request) {
            return null;
        }

        return $this->router->generate($request->get('_route'), array_merge($request->query->all(), $request->get('_route_params', [])), UrlGeneratorInterface::ABSOLUTE_URL);
    }

}
