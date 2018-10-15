<?php

namespace Ddd\Infrastructure\Domain\Model\Recruiter;

use Ddd\Infrastructure\Domain\Model\DoctrineEntityId;

class DoctrineRecruiterId extends DoctrineEntityId
{
    public function getName()
    {
        return 'RecruiterId';
    }

    protected function getNamespace()
    {
        return 'Ddd\Domain\Model\Recruiter';
    }
}
