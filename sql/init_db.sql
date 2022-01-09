CREATE DATABASE STICB505

CREATE TABLE  adresse  (
    id_adresse  int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rue  varchar(255) NOT NULL,
    numero_rue  int NOT NULL,
    code_postal  int NOT NULL,
    commune  varchar(255) NOT NULL
);

CREATE TABLE  enfant  (
    niss  varchar(255) PRIMARY KEY NOT NULL,
    nom  varchar(255) ,
    prenom  varchar(255) ,
    date_naissance date NOT NULL
);
CREATE TABLE  encadrant  (
    niss  varchar(255) PRIMARY KEY NOT NULL,
    nom  varchar(255),
    prenom  varchar(255),
    brevet  boolean,
    experience  boolean
);

CREATE TABLE  federation_mouvement_jeunesse  (
    id  int PRIMARY KEY NOT NULL,
    denomination ENUM ('Les Scouts', 'Les Guides', 'Les Patros', 'Les Scouts et Guides pluralistes', 'Les Faucons Rouges'),
    id_adresse  int,
    FOREIGN KEY (id_adresse) REFERENCES adresse (id_adresse) 
);
CREATE TABLE  unite  (
    numero_agrement  int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    denomination  varchar(255) NOT NULL,
    id_federation_mouvement_jeunesse  int,
    id_adresse  int,
    FOREIGN KEY ( id_federation_mouvement_jeunesse ) REFERENCES  federation_mouvement_jeunesse  ( id ), 
    FOREIGN KEY ( id_adresse ) REFERENCES  adresse  ( id_adresse )

);

CREATE TABLE  responsable_unite  (
    niss  varchar(255) PRIMARY KEY NOT NULL,
    prenom  varchar(255),
    nom  varchar(255),
    email  varchar(255),
    telephone varchar(255),
    id_adresse  int,
    num_agrement_unite  int,
    FOREIGN KEY ( id_adresse ) REFERENCES  adresse  ( id_adresse ),
    FOREIGN KEY ( num_agrement_unite ) REFERENCES  unite  ( numero_agrement ) ON DELETE CASCADE
);

CREATE TABLE  agent_one  (
    niss  varchar(255) PRIMARY KEY NOT NULL,
    prenom  varchar(255),
    nom  varchar(255),
    email  varchar(255),
    telephone  varchar(255),
    attribution  int,
    FOREIGN KEY ( attribution ) REFERENCES  federation_mouvement_jeunesse  ( id )
);

CREATE TABLE  camp  (
    numero_dossier  int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    denomination  varchar(255),
    date_declaration  date NOT NULL,
    frais_de_participation  int,
    date_debut  date NOT NULL,
    date_fin  date NOT NULL,
    presence_enfant_moins_6_ans  boolean,
    num_agrement_unite  int,
    id_adresse  int,
    FOREIGN KEY ( num_agrement_unite ) REFERENCES  unite  ( numero_agrement ) ON DELETE CASCADE,
    FOREIGN KEY ( id_adresse ) REFERENCES  adresse  ( id_adresse )
);

CREATE TABLE  demande_subside  (
    numero_dossier  int PRIMARY KEY NOT NULL,
    date_demande  date,
    statut  varchar(255),
    FOREIGN KEY ( numero_dossier ) REFERENCES  camp  ( numero_dossier ) ON DELETE CASCADE
);

CREATE TABLE  decision  (
    numero_dossier  int PRIMARY KEY NOT NULL,
    statut varchar(255),
    id_agent_traitant  varchar(255),
    montant_subside  int,
    motivation_decision  varchar(255),
    FOREIGN KEY ( numero_dossier ) REFERENCES  demande_subside  ( numero_dossier ) ON DELETE CASCADE, 
    FOREIGN KEY ( id_agent_traitant ) REFERENCES agent_one  ( niss ) 
);


CREATE TABLE  enfant_camp  (
    numero_dossier  int,
    niss_enfant  varchar(255),
    FOREIGN KEY ( niss_enfant ) REFERENCES  enfant  ( niss ) ON DELETE CASCADE,
    FOREIGN KEY ( numero_dossier ) REFERENCES  camp  ( numero_dossier )ON DELETE CASCADE,
    PRIMARY KEY ( numero_dossier, niss_enfant)
);

CREATE TABLE  encadrant_camp  (
    numero_dossier  int,
    niss_encadrant  varchar(255),
    FOREIGN KEY ( niss_encadrant ) REFERENCES  encadrant  ( niss ) ON DELETE CASCADE,
    FOREIGN KEY ( numero_dossier ) REFERENCES  camp  ( numero_dossier ) ON DELETE CASCADE,
    PRIMARY KEY ( numero_dossier, niss_encadrant)
);



INSERT INTO adresse  VALUES (1,'AVENUE GUSTAVE LATINIS',48,1030,'Schaerbeek');
INSERT INTO adresse  VALUES (2,'ABBAYE DE LA CAMBRE',9,1050,'Ixelles');
INSERT INTO adresse  VALUES (3,'RUE NOTHOMB',50,1040,'Etterbeek');

INSERT INTO enfant  VALUES ('91081634978','Potter', 'Harry','2015-02-01');
INSERT INTO enfant  VALUES ('91081634976','Granger', 'Hermione','2015-02-03');
INSERT INTO enfant  VALUES ('91081634977','Weasley', 'Ronald','2015-04-10');

INSERT INTO encadrant  VALUES ('91081631178','Dardenne','Roger',TRUE,TRUE );
INSERT INTO encadrant  VALUES ('91081134976','Julemont','Marine',FALSE, TRUE);
INSERT INTO encadrant  VALUES ('11081634977','Leclerc','Mathilde',FALSE, FALSE);

INSERT INTO federation_mouvement_jeunesse  VALUES (1,'Les Scouts',1);
INSERT INTO federation_mouvement_jeunesse  VALUES (2,'Les Guides',1);
INSERT INTO federation_mouvement_jeunesse  VALUES (3,'Les Patros',1);
INSERT INTO federation_mouvement_jeunesse  VALUES (4,'Les Scouts et Guides pluralistes',1);
INSERT INTO federation_mouvement_jeunesse  VALUES (5,'Les Faucons Rouges',1);

INSERT INTO unite VALUES (101,'Ganshoren',1,2);
INSERT INTO unite VALUES (102,'La Première Ixelles',2,2);
INSERT INTO unite VALUES (103,'Uccle-Forest-Watermael',3,2);
INSERT INTO unite VALUES (104,'Solbosh',4,2);
INSERT INTO unite VALUES (105,'Gauguin',5,2);

INSERT INTO responsable_unite  VALUES ('91001134976','Charlie', 'Randoux','Charlie.Randoux@mail.com','0471276267',3,101);
INSERT INTO responsable_unite  VALUES ('91022134976','Emelyn', 'Rousseau','Emelyn.Rousseau@mail.com','0471276267',3,102);
INSERT INTO responsable_unite  VALUES ('91033334976','Diego', 'Coussemens','Diego.Coussemens@mail.com','0471276267',3,103);
INSERT INTO responsable_unite  VALUES ('94401134976','Yolan', 'Minlend','Yolan.Minlend@mail.com','0471276267',3,104);
INSERT INTO responsable_unite  VALUES ('91555134976','Elise', 'Crouan','Elise.Crouan@mail.com','0471276267',3,105);

INSERT INTO agent_one  VALUES ('91013334976','Mathias', 'Ista','ista@mail.com','0471276267',1);
INSERT INTO agent_one  VALUES ('94421139976','Ozzy', 'Dardenne','Ozzy@mail.com','0471276267',2);
INSERT INTO agent_one  VALUES ('91553174976','Nicolas', 'Labbe','Labbe@mail.com','0471276267',3);
INSERT INTO agent_one  VALUES ('94678134976','Rejane', 'Hulet','Ozzy@mail.com','0471276267',4);
INSERT INTO agent_one  VALUES ('91553134976','Thomas', 'Janzyk','Labbe@mail.com','0471276267',5);

INSERT INTO camp VALUES (1,'Castors - Kinga','2021-03-01',90, '2021-03-11','2021-03-21',FALSE,101,1);
INSERT INTO camp VALUES (2,'Louveteaux - Kinga','2021-04-01',90,'2021-04-11','2021-04-21',FALSE,102,2);
INSERT INTO camp VALUES (3,'Ultragame','2021-05-01',90,'2021-07-05','2021-05-11',FALSE,103,3);
INSERT INTO camp VALUES (4,'Castors','2021-05-01',90,'2021-05-01','2021-05-11',FALSE,104,1);
INSERT INTO camp VALUES (5,'Kinga','2021-06-01',90,'2021-06-01','2021-06-11',FALSE,105,2);

INSERT INTO demande_subside  VALUES (1,'2021-03-30','Non traité');
INSERT INTO demande_subside  VALUES (2,'2021-03-30','Non traité');
INSERT INTO demande_subside  VALUES (3,'2021-03-30','Non traité');
INSERT INTO demande_subside  VALUES (4,'2021-03-30','Non traité');
INSERT INTO demande_subside  VALUES (5,'2021-03-30','Non traité');

INSERT INTO enfant_camp VALUES (1,'91081634978');
INSERT INTO enfant_camp VALUES (1,'91081634976');
INSERT INTO enfant_camp VALUES (1,'91081634977');

INSERT INTO enfant_camp VALUES (2,'91081634978');
INSERT INTO enfant_camp VALUES (2,'91081634976');
INSERT INTO enfant_camp VALUES (2,'91081634977');

INSERT INTO enfant_camp VALUES (3,'91081634978');
INSERT INTO enfant_camp VALUES (3,'91081634976');
INSERT INTO enfant_camp VALUES (3,'91081634977');

INSERT INTO enfant_camp VALUES (4,'91081634978');
INSERT INTO enfant_camp VALUES (4,'91081634976');
INSERT INTO enfant_camp VALUES (4,'91081634977');

INSERT INTO enfant_camp VALUES (5,'91081634978');
INSERT INTO enfant_camp VALUES (5,'91081634976');
INSERT INTO enfant_camp VALUES (5,'91081634977');

INSERT INTO encadrant_camp VALUES (1,'91081631178');
INSERT INTO encadrant_camp VALUES (1,'91081134976');
INSERT INTO encadrant_camp VALUES (1,'11081634977');

INSERT INTO encadrant_camp VALUES (2,'91081631178');
INSERT INTO encadrant_camp VALUES (2,'91081134976');
INSERT INTO encadrant_camp VALUES (2,'11081634977');

INSERT INTO encadrant_camp VALUES (3,'91081631178');
INSERT INTO encadrant_camp VALUES (3,'91081134976');
INSERT INTO encadrant_camp VALUES (3,'11081634977');

INSERT INTO encadrant_camp VALUES (4,'91081631178');
INSERT INTO encadrant_camp VALUES (4,'91081134976');
INSERT INTO encadrant_camp VALUES (4,'11081634977');

INSERT INTO encadrant_camp VALUES (5,'91081631178');
INSERT INTO encadrant_camp VALUES (5,'91081134976');
INSERT INTO encadrant_camp VALUES (5,'11081634977');




