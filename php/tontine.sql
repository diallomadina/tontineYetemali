Create database tontine;
use tontine;
-- Creation des tables

-- Pour Agence
create table Agence(
    idAgence int primary key auto_increment,
    nomAgence varchar(200),
    adresseAgence varchar(200),
    telAgence varchar(200)
);

-- Pour Agent
create table Agent(
    idAgent int primary key auto_increment,
    matriculeAgent varchar(200) unique,
    nomAgent varchar(100),
    prenomAgent varchar(250),
    adresseAgent varchar(200),
    telAgent varchar(200),
    mailAgent varchar(200),
    idAgence int,
    constraint fk_agent_agence foreign key (idAgence) REFERENCES Agence(idAgence)
);

--Pour Membre
create table Membre(
    idMembre int primary key auto_increment,
    nomMembre varchar(100),
    prenomMembre varchar(200),
    adresseMembre varchar(200),
    dateAdhesion Date,
    telMembre varchar(200),
     mailMembre varchar(200),
    idAgent int,
    constraint fk_membre_agent foreign key (idAgent) REFERENCES Agent(idAgent)
);

-- Pour tontine Collective
create table TontineCollective(
    idTontineCollectif int primary key auto_increment,
    nomTontineCollective varchar(200),
    debut DATE,
    montant int not null,
    frequence int not null,
    nombreParticipant int not null,
    idAgent int,
    constraint fk_tcollectif_agent foreign key (idAgent) REFERENCES Agent(idAgent)
);

-- Pour tontine Individuelle
create table TontineIndividuelle(
    idTontineIndividuelle int primary key auto_increment,
    nomTontineIndividuelle varchar(200),
    debut DATE not null,
    montant int not null,
    idMembre int not null,
    idAgent int,
    constraint fk_tIndividuelle_agent foreign key (idAgent) REFERENCES Agent(idAgent),
    constraint fk_tIndividuelle_membre foreign key (idMembre) REFERENCES Membre(idMembre)
);

-- Pour Payement Collectif
create table Payement(
    idPayement int primary key auto_increment,
    montantPayement int not null,
    datePayement Date not null,
    idTontineCollectif int,
    idMembre int,
    constraint fk_Payement_tontine foreign key (idTontineCollectif) REFERENCES TontineCollective(idTontineCollectif),
    constraint fk_Payement_membre foreign key (idMembre) REFERENCES Membre(idMembre)
);

-- Pour Cotisation individuelle
create table Cotisation(
    idCotisation int primary key auto_increment,
    montantCotisation int not null,
    dateCotisation Date not null,
    idTontineIndividuelle int,
    idMembre int,
    constraint fk_Cotisation_tontine foreign key (idTontineIndividuelle) REFERENCES TontineIndividuelle(idTontineIndividuelle),
    constraint fk_Cotisation_membre foreign key (idMembre) REFERENCES Membre(idMembre)
);

-- Pour les utilisateurs
create table utilisateurs(
    idUser int primary key auto_increment,
    username varchar(200) not null,
    passwrd varchar(50) not null,
    typeUtilisateur varchar(50) not null
);