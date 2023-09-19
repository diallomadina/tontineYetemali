Create database tontine;
use tontine;
-- Creation des tables

-- Pour Agence
create table Agence(
    idAgence int primary key auto_increment,
    codeAgence varchar(50) unique not null,
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
    photoAgent varchar(300),
    idAgence int,
    constraint fk_agent_agence foreign key (idAgence) REFERENCES Agence(idAgence)
);

--Pour Membre
create table Membre(
    idMembre int primary key auto_increment,
    matriculeMembre varchar(100) unique not null,
    nomMembre varchar(100),
    prenomMembre varchar(200),
    adresseMembre varchar(200),
    dateAdhesion Date,
    telMembre varchar(200),
    photoMembre varchar(300),
     mailMembre varchar(200),
    idAgent int,
    constraint fk_membre_agent foreign key (idAgent) REFERENCES Agent(idAgent)
);

-- Pour tontine Collective
create table TontineCollective(
    idTontineCollectif int primary key auto_increment,
    codeTontineCollective varchar(50) unique not null,
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
    codeTontineIndividuelle varchar(50) unique not null,
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
    codePayement varchar(50) unique not null,
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
    codeCotisation varchar(50) unique not null,
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
    codeUser varchar(50) unique not null,
    username varchar(200) not null,
    passwrd varchar(50) not null,
    typeUtilisateur varchar(50) not null
);

Create table paticipation(
    id int primary key auto_increment,
    Tontine int,
    membre int,
    constraint fk_pa_ton foreign key (tontine) REFERENCES TontineCollective (idTontineCollectif),
    constraint fk_pa_mem foreign key (membre) REFERENCES TontineIndividuelle (idTontineIndividuelle)
);

INSERT INTO Agent(matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, idAgence)
Values('YM5326SHHASB', 'Diallo', 'Ibreahima', 'Hamdallay', '6356271878', 'jdhsak@cina', 1),
('YM532634HASB', 'Sow', 'Mamadou', 'Coja', '6356271878', 'jdhsak@cina', 2),
('YM5625JASDJ', 'Camara', 'Aissatou', '737', '723782', 'jdhsak@cina', 3),
('YM53we234HASB', 'Sylla', 'Mamadou', 'Coja', '6356271878', 'jdhsak@cina', 2);

INSERT INTO Membre(matriculeMembre, nomMembre, prenomMembre, adresseMembre, dateAdhesion, telMembre, mailMembre, idAgent)
Values('YM728AJKHD7', 'Sidibe', 'Alhassane', 'Coja', '12/12/2023', '624317376', 'djkahdj@jdask', 5),
('YMEHWH378238', 'Camara', 'Oumou', 'Cite', '12/12/2023', '624317376', 'djkahdj@jdask', 6),
('YJSD778HDAJ', 'Diallo', 'Aissatou', 'Cite', '12/12/2023', '624317376', 'djkahdj@jdask', 7);

