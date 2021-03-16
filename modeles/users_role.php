<?php

class Users_role extends Database {
    private $users_role_id;
    private $users_role_role;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get the value of users_role_id
     */
    public function getUsers_role_id()
    {
        return $this->users_role_id;
    }

    /**
     * Set the value of users_role_id
     */
    public function setUsers_role_id($users_role_id)
    {
        $this->users_role_id = $users_role_id;
    }

    /**
     * Get the value of users_role_role
     */
    public function getUsers_role_role()
    {
        return $this->users_role_role;
    }

    /**
     * Set the value of users_role_role
     */
    public function setUsers_role_role($users_role_role)
    {
        $this->users_role_role = $users_role_role;
    }
}
