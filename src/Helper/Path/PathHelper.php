<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Helper\Path;

use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class PathHelper
 * @package Dbout\Bundle\SymfonyHelperBundle\Helper\Path
 */
class PathHelper
{

    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * PathHelper constructor.
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param string $path
     * @return string
     */
    public function inProjectDir(string $path): string
    {
        return $this->kernel->getProjectDir() . $this->clean($path);
    }

    /**
     * @param string $path
     * @return string
     */
    public function inPublicDir(string $path): string
    {
        return $this->kernel->getProjectDir() . '/public'. $this->clean($path);
    }

    /**
     * @param string $path
     * @return string
     */
    private function clean(string $path): string
    {
        $path = trim(trim($path, '\\'), '/');
        return '/'.$path;
    }

}