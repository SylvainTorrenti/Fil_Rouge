--
-- FIL_ROUGE - Création des table de la base de données
--
CREATE DATABASE IF NOT EXISTS FIL_ROUGE; 
USE FIL_ROUGE;

drop table if exists Message;
drop table if exists TicketMessage;
drop table if exists Ticket;
drop table if exists Status;
drop table if exists TypePanne;
drop table if exists TicketMateriel;
drop table if exists User;	
drop table if exists UserRole;
drop table if exists Role;


create table Message(
   Id int,
   Content VARCHAR(90),
   IdAuteur INTEGER,
   CreatedAt DATE,
   User_id Int,
   constraint Message_PK primary key(Id)
) ENGINE = InnoDB; 


create table TicketMessage(
   IdMessage int,
   IdTicket int,
   constraint TicketMessage_PK primary key(IdMessage,IdTicket)
) ENGINE=InnoDB;

CREATE TABLE Ticket(
   Id INT,
   Sujet VARCHAR(90),
   IdStatus int,
   IdTypePanne int,
   IdAuteur int,
   CreatedAt date,
   UpdatedAt date,
   User_id Int,
   Type_panne_id int,
   Status_id int,
   constraint Ticket_PK primary key(Id)
) ENGINE=InnoDB;

create table Status(
	Id int,
	Label VARCHAR(90),
	constraint Status_PK primary key(Id)
) ENGINE=InnoDB;

create table TypePanne(
	Id int,
	Label VARCHAR(90),
	constraint TypePanne_PK primary key(Id)
) ENGINE=InnoDB;

create table TicketMateriel(
	IdTicket int,
	IdMateriel int,
	constraint TicketMateriel_PK primary key(IdTicket,IdMateriel)
) ENGINE=InnoDB;

create table User(
	Id int,
	Prenom VARCHAR (25),
	Nom VARCHAR (25),
	Tel VARCHAR(10),
	Email VARCHAR(50),
	Password VARCHAR(50),
	constraint User_PK primary key(Id)
) ENGINE=InnoDB;

create table UserRole(
	IdUser int,
	IdRole int,
	constraint UserRole_PK primary key(IdUser,IdRole)
) ENGINE=InnoDB;

create table Role(
	Id int,
	Label VARCHAR(90),
	constraint Role_PK primary key(Id)
) ENGINE=InnoDB;
