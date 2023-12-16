<?php

namespace Customize\Repository;

use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Customize\Entity\PoolMetaData;
use Ketcau\Repository\AbstractRepository;

class PoolMetaDataRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PoolMetaData::class);
    }
}