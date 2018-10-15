<?php

namespace Ddd\Application\Service\Recruiter;

class SignUpRecruiterRequest
{
    private $name;
    private $username;
    private $email;
    private $password;

    public function __construct($name, $username, $email, $password)
    {
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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
