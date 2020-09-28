<?php


namespace App\classes;


class UserSession
{
    public $name;
    public $email;
    public $roleId;

    /**
     * UserSession constructor.
     * @param $name
     * @param $email
     * @param $roleId
     */
    public function __construct($name, $email, $roleId)
    {
        $this->name = $name;
        $this->email = $email;
        $this->roleId = $roleId;
    }
}
