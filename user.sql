#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users_role
#------------------------------------------------------------

CREATE TABLE users_role(
        `users_role_id`   Int  Auto_increment  NOT NULL ,
        `users_role_role` Varchar (50) NOT NULL
	,CONSTRAINT users_role_PK PRIMARY KEY (users_role_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        `id`            Int  Auto_increment  NOT NULL ,
        `lastname`      Varchar (50) NOT NULL ,
        `firstname`     Varchar (50) NOT NULL ,
        `username`      Varchar (20) NOT NULL ,
        `password`      Varchar (50) NOT NULL ,
        `users_role_id` Int NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id)

	,CONSTRAINT User_users_role_FK FOREIGN KEY (users_role_id) REFERENCES users_role(users_role_id)
)ENGINE=InnoDB;
