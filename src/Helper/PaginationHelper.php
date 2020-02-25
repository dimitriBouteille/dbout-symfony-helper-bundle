<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Helper;

use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class PaginationHelper
 * @package Dbout\Bundle\SymfonyHelperBundle\Helper
 */
class PaginationHelper
{

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var \Symfony\Component\HttpFoundation\Request|null
     */
    private $request;

    /**
     * PaginationHelper constructor.
     * @param RouterInterface $router
     * @param RequestStack $requestStack
     */
    public function __construct(RouterInterface $router, RequestStack $requestStack)
    {
        $this->router = $router;
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * Check if pagination has next url
     *
     * @param SlidingPagination $pagination
     * @return bool
     */
    public function hasNextUrl(SlidingPagination $pagination): bool
    {
        return ($pagination->getCurrentPageNumber() < $pagination->getPageCount() && $pagination->getPageCount() > 1);
    }

    /**
     * Check if pagination has prev url
     *
     * @param SlidingPagination $pagination
     * @return bool
     */
    public function hasPrevUrl(SlidingPagination $pagination): bool
    {
        return ($pagination->getCurrentPageNumber() > 1 && $pagination->getPageCount() > 1);
    }

    /**
     * Get prev url
     *
     * @param SlidingPagination $pagination
     * @return string|null
     */
    public function prevUrl(SlidingPagination $pagination): ?string
    {
        if($this->hasPrevUrl($pagination)) {
            return $this->pageUrl($pagination->getCurrentPageNumber() - 1);
        }

        return null;
    }

    /**
     * Get next url
     *
     * @param SlidingPagination $pagination
     * @return string|null
     */
    public function nextUrl(SlidingPagination $pagination): ?string
    {
        if($this->hasNextUrl($pagination)) {
            return $this->pageUrl($pagination->getCurrentPageNumber() + 1);
        }

        return null;
    }

    /**
     * Generate url
     *
     * @param int $pageNumber
     * @return string
     */
    public function pageUrl(int $pageNumber): string
    {
        if($pageNumber < 2) {
            $pageNumber = null;
        }

        $data = array_merge($this->request->query->all(), $this->request->get('_route_params', []));
        return $this->router->generate($this->request->get('_route'), array_merge($data, [
            'page' => $pageNumber,
        ]), UrlGeneratorInterface::ABSOLUTE_URL);
    }

}