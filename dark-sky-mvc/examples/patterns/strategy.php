<?php

// change this example to proper one
class LoginStrategy
{
    private $strategy = null;

    public function __construct($login_type)
    {
        switch ($login_type) {
            case 'facebook':
                $this->strategy = new FacebookAuth();
                break;
            case 'jira':
                $this->strategy = new JiraAuth();
                break;
            case 'andigital':
                $this->strategy = new ANDAuth();
                break;
        }
    }

    public function login($user, $pass)
    {
        $this->strategy->login($user, $pass);
    }
}

$auth = new LoginStrategy('facebook');
$auth->login('Andi', '4nd1');
