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
    nom  varchar(255),
    prenom  varchar(255),
    email  varchar(255),
    telephone varchar(255),
    id_adresse  int,
    num_agrement_unite  int,
    FOREIGN KEY ( id_adresse ) REFERENCES  adresse  ( id_adresse ),
    FOREIGN KEY ( num_agrement_unite ) REFERENCES  unite  ( numero_agrement ) ON DELETE CASCADE
);

CREATE TABLE  agentONE  (
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
    statut ENUM ('Accorde', 'Refuse', 'Non traité'),
    id_agent_traitant  varchar(255),
    montant_subside  int,
    motivation_decision  varchar(255),
    FOREIGN KEY ( numero_dossier ) REFERENCES  demande_subside  ( numero_dossier ) ON DELETE CASCADE, 
    FOREIGN KEY ( id_agent_traitant ) REFERENCES agentONE  ( niss ) 
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






