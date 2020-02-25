<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Twig\Extension;

use Dbout\Bundle\SymfonyHelperBundle\Helper\PaginationHelper;
use Dbout\Bundle\SymfonyHelperBundle\Helper\Routing\RoutingHelper;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
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
     * @var PaginationHelper
     */
    private $paginationHelper;

    /**
     * DboutSymfonyHelperTwig constructor.
     * @param RoutingHelper $routingHelper
     */
    public function __construct(RoutingHelper $routingHelper, PaginationHelper $paginationHelper)
    {
        $this->routingHelper = $routingHelper;
        $this->paginationHelper = $paginationHelper;
    }

    /**
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        $config = ['is_safe' => ['html',]];
        return [
            new TwigFunction('isRoute', [$this, 'isRoute']),
            new TwigFunction('paginationPrevUrl', [$this, 'paginationPrevUrl'], $config),
            new TwigFunction('paginationNextUrl', [$this, 'paginationNextUrl'], $config),
            new TwigFunction('paginationHasPrevUrl', [$this, 'paginationHasPrevUrl'], $config),
            new TwigFunction('paginationHasNextUrl', [$this, 'paginationHasNextUrl'], $config),
            new TwigFunction('paginationUrl', [$this, 'paginationUrl'], $config),
        ];
    }

    /**
     * @return array|TwigFilter[]
     */
    public function getFilters()
    {
        return [
            new TwigFilter('yesNo', [$this, 'transformBooleanToYesNo']),
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

    /**
     * @param $value
     * @return string
     */
    public function transformBooleanToYesNo($value): string
    {
        if($value === true || $value === 1) {
            return 'oui';
        } else if($value === false || $value === 0) {
            return 'non';
        }

        return 'N.A';
    }

    /**
     * @param SlidingPagination $pagination
     * @return string|null
     */
    public function paginationPrevUrl(SlidingPagination $pagination): ?string
    {
        return $this->paginationHelper->prevUrl($pagination);
    }

    /**
     * @param SlidingPagination $pagination
     * @return bool
     */
    public function paginationHasPrevUrl(SlidingPagination $pagination): bool
    {
        return $this->paginationHelper->hasPrevUrl($pagination);
    }

    /**
     * @param SlidingPagination $pagination
     * @return string|null
     */
    public function paginationNextUrl(SlidingPagination $pagination): ?string
    {
        return $this->paginationHelper->nextUrl($pagination);
    }

    /**
     * @param SlidingPagination $pagination
     * @return bool
     */
    public function paginationHasNextUrl(SlidingPagination $pagination): bool
    {
        return $this->paginationHelper->hasNextUrl($pagination);
    }

    /**
     * @param int $pageNumber
     * @return string
     */
    public function paginationUrl(int $pageNumber): string
    {
        return $this->paginationHelper->pageUrl($pageNumber);
    }

}