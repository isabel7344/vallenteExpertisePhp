#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `vallente expertise` CHARACTER SET 'utf8';
USE `vallente expertise`;

#------------------------------------------------------------
# Table: TRAINING_SESSIONS
#------------------------------------------------------------

CREATE TABLE TRAINING_SESSIONS(
        ID                        Int  Auto_increment  NOT NULL ,
        NAME_TRAINING             Varchar (50) NOT NULL ,
        START_DATE_TRAINING       Date NOT NULL ,
        END_DATE_TRAINING         Date NOT NULL ,
        NUMBER_OF_PLACES_TRAINING Int NOT NULL ,
        NUMBER_PLACES_TAKEN       Int NOT NULL
	,CONSTRAINT TRAINING_SESSIONS_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;

