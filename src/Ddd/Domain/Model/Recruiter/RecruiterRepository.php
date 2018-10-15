<?php

namespace Ddd\Domain\Model\Recruiter;

/**
 * Interface RecruiterRepository.
 */
interface RecruiterRepository {

    /**
     * @param RecruiterId $userId
     *
     * @return Recruiter
     */
    public function ofId(RecruiterId $userId);

    /**
     * @param string $username
     *
     * @return Recruiter
     */
    public function ofUsername($username);

    /**
     * @param Recruiter $user
     */
    public function add(Recruiter $user);

    /**
     * @return RecruiterId
    */
    public function nextIdentity();
}
