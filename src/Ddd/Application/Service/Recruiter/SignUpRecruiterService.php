<?php

namespace Ddd\Application\Service\Recruiter;

use Ddd\Application\DataTransformer\Recruiter\RecruiterDataTransformer;
use Ddd\Domain\Model\Recruiter\Recruiter;
use Ddd\Application\Service\ApplicationService;
use Ddd\Domain\Model\Recruiter\RecruiterUsernameAlreadyExistsException;
use Ddd\Domain\Model\Recruiter\RecruiterRepository;

class SignUpRecruiterService implements ApplicationService
{
    private $recruiterRepository;
    private $recruiterDataTransformer;

    public function __construct(
        RecruiterRepository $recruiterRepository,
        RecruiterDataTransformer $recruiterDataTransformer
    ) {
        $this->recruiterRepository = $recruiterRepository;
        $this->recruiterDataTransformer = $recruiterDataTransformer;
    }

    /**
     * @param SignUpRecruiterRequest $request
     *
     * @return Recruiter
     *
     * @throws RecruiterUsernameAlreadyExistsException
     */
    public function execute($request = null)
    {
        $email = $request->email();
        $password = $request->password();
        $name = $request->name();
        $username = $request->username();
        
        $recruiter = $this->recruiterRepository->ofUsername($username);
        if (null !== $recruiter) {
            throw new RecruiterUsernameAlreadyExistsException();
        }

        $recruiter = new Recruiter(
            $this->recruiterRepository->nextIdentity(),
            $email,
            $password,
            $username,
            $name
        );

        $this->recruiterRepository->add($recruiter);

        $this->recruiterDataTransformer->write($recruiter);
        return $this->recruiterDataTransformer->read();
    }
}
