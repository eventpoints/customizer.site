<?php declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Symfony\Component\Uid\UuidV4;

class UuidV4Generator extends AbstractIdGenerator
{

    public function generateId(EntityManagerInterface $em, ?object $entity): mixed
    {
        return new UuidV4();
    }
}