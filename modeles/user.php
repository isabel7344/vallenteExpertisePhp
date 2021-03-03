<?php

class User extends Database
{
    private $id;
    private $lastname;
    private $firstname;
    private $username;
    private $password;
    private $users_role;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    /**
     * Get the value of Username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of Username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    /**
     * Get the value of users_role
     */
    public function getUsersRole()
    {
        return $this->users_role;
    }

    /**
     * Set the value of users_role
     *
     * @return  self
     */
    public function setUsersRole($users_role)
    {
        $this->users_role = $users_role;

        return $this;
    }

    /**
     * VerifyUserPresence prend en parametre le nom d'utilisateur et le mot de passe venant du form de connection
     * @param form_username => username de la personne se connectant
     * @param form_password => mot de passe de la personne se connectant
     * @return  utilisateur ou null si aucun utilisateur n'est trouvé avec ces informations
     */
    public function verifyUserPresence($form_username, $form_password) {

        $query = "SELECT * FROM user WHERE `username` = :form_username";
        $buildQuery = parent::getDb()->prepare($query);
        // On attribue les valeurs de nos variable PHP a notre query SQL
        $buildQuery->bindValue("form_username", $form_username);
        $buildQuery->execute();
        $user = $buildQuery->fetch(PDO::FETCH_ASSOC);
        // on doit verifier le mot de passe entrer dans le form et le mot de passe de
        // l'utisateur recup en bdd pour voir si il corresponde avant de confirmer la connection
        if (password_verify($form_password, $user["password"])) {
            return $user;
        } else {
            return null;
        }
    }
}