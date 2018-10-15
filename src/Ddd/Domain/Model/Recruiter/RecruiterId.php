<?php

namespace Ddd\Domain\Model\Recruiter;

use Ramsey\Uuid\Uuid;

class RecruiterId {

    private $id;

    public function __construct($id) {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    public function id() {
        return $this->id;
    }

    public function equalsTo(RecruiterId $id) {
        return $id->id === $this->id;
    }

}
