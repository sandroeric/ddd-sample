<?php

namespace Ddd\Domain\Model\Recruiter;

class Recruiter {
    
    private $recruiter_id;
    private $name;
    private $username;
    private $email;
    private $password;
    
    public function __construct($recruiterId, $name, $username, $email, $password)
    {
        $this->recruiter_id = $recruiterId;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function id()
    {
        return $this->recruiter_id;
    }
    
    public function username()
    {
        return $this->username;
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function email()
    {
        return $this->email;
    }
    
    public function password()
    {
        return $this->password;
    }
}