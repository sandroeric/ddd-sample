<?php

namespace Ddd\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManager
     */
    public static function build()
    {
        \Doctrine\DBAL\Types\Type::addType('RecruiterId', 'Ddd\Infrastructure\Domain\Model\Recruiter\DoctrineRecruiterId');

        return EntityManager::create(
            array( 'driver' => 'pdo_mysql', 'user' => 'root', 'password' => '', 'dbname' => 'ddd', ),
            Setup::createYAMLMetadataConfiguration([__DIR__ . '/Mapping'], true)
        );
    }
}
