#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `vallente expertise` CHARACTER SET 'utf8';
USE `vallente expertise`;

#------------------------------------------------------------
# Table: sessions
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `session`(
        `id`        INT (11) AUTO_INCREMENT  NOT NULL ,
        `date`  VARCHAR (25) NOT NULL ,
        `firstname` VARCHAR (25) NOT NULL ,
        `birthdate` DATE NOT NULL ,
        `phone`     VARCHAR (25) ,
        `mail`      VARCHAR (100) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appointments
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `appointments`(
        `id`         INT (11) AUTO_INCREMENT  NOT NULL ,
        `dateHour`   DATETIME NOT NULL ,
        `idPatients` INT (11) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;

ALTER TABLE `appointments` ADD CONSTRAINT FK_appointments_id_patients FOREIGN KEY (`idPatients`) REFERENCES `patients`(`id`);
