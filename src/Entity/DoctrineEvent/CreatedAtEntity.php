<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Entity\DoctrineEvent;

/**
 * Interface CreatedAtEntity
 * @package Dbout\Bundle\SymfonyHelperBundle\Entity\DoctrineEvent
 */
interface CreatedAtEntity
{

    /**
     * @param \DateTimeInterface|null $updatedAt
     * @return mixed
     */
    public function setCreatedAt(?\DateTimeInterface $updatedAt);

    /**
     * @return mixed
     */
    public function getCreatedAt();

}