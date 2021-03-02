<?php

class Administrator_User extends Database
{
    private $Administrator_User_id;
    private $Administrator_User_lastname;
    private $Administrator_User_firstname;
    private $Administrator_User_Username;
    private $Administrator_User_mail;
    private $Administrator_User_password;
    private $users_role;
    

    /**
     * Get the value of Administrator_User_id
     */ 
    public function getAdministrator_User_id()
    {
        return $this->Administrator_User_id;
    }

    /**
     * Set the value of Administrator_User_id
     *
     * @return  self
     */ 
    public function setAdministrator_User_id($Administrator_User_id)
    {
        $this->Administrator_User_id = $Administrator_User_id;

        return $this;
    }

    /**
     * Get the value of Administrator_User_lastname
     */ 
    public function getAdministrator_User_lastname()
    {
        return $this->Administrator_User_lastname;
    }

    /**
     * Set the value of Administrator_User_lastname
     *
     * @return  self
     */ 
    public function setAdministrator_User_lastname($Administrator_User_lastname)
    {
        $this->Administrator_User_lastname = $Administrator_User_lastname;

        return $this;
    }

    /**
     * Get the value of Administrator_User_firstname
     */ 
    public function getAdministrator_User_firstname()
    {
        return $this->Administrator_User_firstname;
    }

    /**
     * Set the value of Administrator_User_firstname
     *
     * @return  self
     */ 
    public function setAdministrator_User_firstname($Administrator_User_firstname)
    {
        $this->Administrator_User_firstname = $Administrator_User_firstname;

        return $this;
    }

    /**
     * Get the value of Administrator_User_mail
     */ 
    public function getAdministrator_User_mail()
    {
        return $this->Administrator_User_mail;
    }

    /**
     * Set the value of Administrator_User_mail
     *
     * @return  self
     */ 
    public function setAdministrator_User_mail($Administrator_User_mail)
    {
        $this->Administrator_User_mail = $Administrator_User_mail;

        return $this;
    }

    /**
     * Get the value of Administrator_User_password
     */ 
    public function getAdministrator_User_password()
    {
        return $this->Administrator_User_password;
    }

    /**
     * Set the value of Administrator_User_password
     *
     * @return  self
     */ 
    public function setAdministrator_User_password($Administrator_User_password)
    {
        $this->Administrator_User_password = $Administrator_User_password;

        return $this;
    }  
    /**
     * Get the value of Administrator_User_Username
     */ 
    public function getAdministrator_User_Username()
    {
        return $this->Administrator_User_Username;
    }

    /**
     * Set the value of Administrator_User_Username
     *
     * @return  self
     */ 
    public function setAdministrator_User_Username($Administrator_User_Username)
    {
        $this->Administrator_User_Username = $Administrator_User_Username;

        return $this;
    }
    /**
     * Get the value of users_role
     */ 
    public function getUsers_role()
    {
        return $this->users_role;
    }

    /**
     * Set the value of users_role
     *
     * @return  self
     */ 
    public function setUsers_role($users_role)
    {
        $this->users_role = $users_role;

        return $this;
    }
    public function __construct()
    {
        parent::__construct();
    }
}  
