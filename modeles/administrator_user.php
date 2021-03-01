<?php

class Administrator_User extends Database
{
    private $Administrator_User_id;
    private $Administrator_User_lastname;
    private $Administrator_User_firstname;
    private $Administrator_User_Username;
    private $Administrator_User_mail;
    private $Administrator_User_password;
    

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
    public function __construct()
    {
        parent::__construct();
    }
    public function connectUser($arrayParameters) {
        $query = "INSERT INTO `Administrator_User` (`Administrator_User_lastname`, `Administrator_User_firstname`,`Administrator_User_Username`, `Administrator_User_mail`, `Administrator_User_password`) VALUES (:firstname, :lastname, :username, :password, :mail);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("firstname", $arrayParameters["firstname"], PDO::PARAM_STR);
        $buildQuery->bindValue("lastname", $arrayParameters["lastname"], PDO::PARAM_STR);
        $buildQuery->bindValue("username", $arrayParameters["username"], PDO::PARAM_STR);
        $buildQuery->bindValue("password", $arrayParameters["password"], PDO::PARAM_STR);
        $buildQuery->bindValue("mail", $arrayParameters["mail"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }  
}  