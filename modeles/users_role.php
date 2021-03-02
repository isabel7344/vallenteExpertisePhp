<?php

class Users_role extends Database {

    private $users_role_id;
    private $users_role_role;
    

    /**
     * Get the value of users_role_id
     */ 
    public function getUsers_role_id()
    {
        return $this->users_role_id;
    }

    /**
     * Set the value of users_role_id
     *
     * @return  self
     */ 
    public function setUsers_role_id($users_role_id)
    {
        $this->users_role_id = $users_role_id;

        return $this;
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
     *
     * @return  self
     */ 
    public function setUsers_role_role($users_role_role)
    {
        $this->users_role_role = $users_role_role;

        return $this;
    }

    public function __construct() {
        parent::__construct();
    }
    public function verifyUserPresence($Administrator_User_Username) {
        $query = "SELECT `Administrator_User_id`, `Administrator_User_lastname`, `Administrator_User_firstname`, `Administrator_User_Username`, `Administrator_User_mail`, `Administrator_User_password`, `USER_ROLE_ROLE` 
        FROM `users_role` 
        INNER JOIN `Administrator_User` 
        ON `users_role`.`USER_ROLE_ID` = `Administrator_User`.`USER_ROLE_ID`
        WHERE `Administrator_User`.`Administrator_User_Username` = :Administrator_User_Username;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("Administrator_User_Username", $Administrator_User_Username);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
    }
