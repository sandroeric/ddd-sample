<?php

namespace Ddd\Application\DataTransformer\Recruiter;

use Ddd\Domain\Model\Recruiter\Recruiter;

class RecruiterDataTransformer
{
    private $recruiter;

    public function write(Recruiter $recruiter)
    {
        $this->recruiter = $recruiter;

        return $this;
    }

    public function read()
    {
        return [
            'id' => $this->recruiter->id()->id(),
        ];
    }
}
