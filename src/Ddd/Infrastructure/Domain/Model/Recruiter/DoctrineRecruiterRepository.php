<?php

namespace Ddd\Infrastructure\Domain\Model\Recruiter;

use Doctrine\ORM\EntityRepository;
use Ddd\Domain\Model\Recruiter\Recruiter;
use Ddd\Domain\Model\Recruiter\RecruiterId;
use Ddd\Domain\Model\Recruiter\RecruiterRepository;
use Ddd\Infrastructure\Persistence\Doctrine\EntityManagerFactory;

class DoctrineRecruiterRepository extends EntityRepository implements RecruiterRepository
{
    /**
     * @param RecruiterId $id
     *
     * @return Recruiter
     */
    public function ofId(RecruiterId $id)
    {
        return $this->find($id);
    }

    /**
     * @param string $username
     *
     * @return Recruiter
     */
    public function ofUsername($username)
    {
        return $this->findOneBy(['username' => $username]);
    }

    /**
     * @param Recruiter $recruiter
     */
    public function add(Recruiter $recruiter)
    {
        $this->getEntityManager()->persist($recruiter);
    }

    /**
     * @return RecruiterId
     */
    public function nextIdentity()
    {
        return new RecruiterId();
    }
}
