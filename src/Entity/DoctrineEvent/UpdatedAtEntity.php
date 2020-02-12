<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Entity\DoctrineEvent;

/**
 * Interface UpdatedAtEntity
 * @package Dbout\Bundle\SymfonyHelperBundle\Entity\DoctrineEvent
 */
interface UpdatedAtEntity
{

    /**
     * @param \DateTimeInterface|null $updatedAt
     * @return mixed
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt);

    /**
     * @return mixed
     */
    public function getUpdatedAt();

}