<?php

namespace Customize\Repository;

use Customize\Entity\JsonBracket;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Ketcau\Repository\AbstractRepository;

class JsonBracketRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JsonBracket::class);
    }
}