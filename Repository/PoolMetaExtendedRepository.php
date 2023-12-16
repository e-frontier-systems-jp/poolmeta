<?php

namespace Customize\Repository;

use Customize\Entity\PoolMetaExtended;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Ketcau\Repository\AbstractRepository;

class PoolMetaExtendedRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PoolMetaExtended::class);
    }
}