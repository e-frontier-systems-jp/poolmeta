<?php

namespace Customize\Repository;

use Customize\Entity\JsonKeyValue;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Ketcau\Repository\AbstractRepository;

class JsonKeyValueRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JsonKeyValue::class);
    }
}