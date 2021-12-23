CREATE TABLE  federation_mouvement_jeunesse  (
    id  int PRIMARY KEY NOT NULL,
    denomination ENUM ('Les Scouts', 'Les Guides', 'Les Patros', 'Les Scouts et Guides pluralistes', 'Les Faucons Rouges'),
    FK_id_adresse  int,
    FOREIGN KEY (FK_id_adresse) REFERENCES adresse (id_adresse)
);

CREATE TABLE  unite  (
    numero_agrement  int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    denomination  varchar(255) NOT NULL,
    FK_federation_mouvement_jeunesse  int,
    FK_id_adresse  int
    FOREIGN KEY ( FK_federation_mouvement_jeunesse ) REFERENCES  federation_mouvement_jeunesse  ( id );
    FOREIGN KEY ( FK_id_adresse ) REFERENCES  adresse  ( id_adresse );

);

CREATE TABLE  responsable_unite  (
    niss  int PRIMARY KEY NOT NULL,
    nom  varchar(255),
    prenom  varchar(255),
    email  varchar(255),
    telephone  varchar(255)
    FK_adresse  int,
    FK_num_agrement_unite  int,
    FOREIGN KEY ( FK_adresse ) REFERENCES  adresse  ( id_adresse ),
    FOREIGN KEY ( FK_num_agrement_unite ) REFERENCES  unite  ( numero_agrement );
);

CREATE TABLE  camp  (
    numero_dossier  int PRIMARY KEY NOT NULL,
    denomination  varchar(255),
    section  varchar(255),
    date_declaration  timestamp NOT NULL,
    frais_de_participation  int,
    date_debut  datetime NOT NULL,
    date_fin  datetime NOT NULL,
    présence_enfant_moins_6_ans  boolean,
    accueil_enfant_besoins_specifiques  boolean,
    FK_num_agrement_unite  int ,
    FK_id_adresse  int
    FOREIGN KEY ( FK_num_agrement_unite ) REFERENCES  unite  ( numero_agrement );
    FOREIGN KEY ( FK_id_adresse ) REFERENCES  adresse  ( id_adresse );
);

CREATE TABLE  adresse  (
    adresse_id  int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rue  varchar(255) NOT NULL,
    numero_rue  int NOT NULL,
    code_postal  int NOT NULL,
    commune  varchar(255) NOT NULL
);

CREATE TABLE  enfant  (
    niss  int PRIMARY KEY NOT NULL,
    nom  varchar(255) ,
    prenom  varchar(255) ,
    annee_naissance  datetime NOT NULL,
    statut_ebs boolean
);

CREATE TABLE  encadrant  (
    niss  int PRIMARY KEY NOT NULL,
    nom  varchar(255),
    prenom  varchar(255),
    brevet  boolean,
    experience  boolean
);

CREATE TABLE  enfant_camp  (
    FK_numero_dossier  int,
    FK_niss_enfant  int,
    FOREIGN KEY ( FK_niss_enfant ) REFERENCES  enfant  ( niss ),
    FOREIGN KEY ( FK_numero_dossier ) REFERENCES  camp  ( numero_dossier ),
    PRIMARY KEY (FK_numero_dossier, FK_niss_enfant)
);

CREATE TABLE  encadrant_camp  (
    FK_numero_dossier  int,
    FK_niss_encadrant  int,
    FOREIGN KEY ( FK_niss_encadrant ) REFERENCES  encadrant  ( niss ),
    FOREIGN KEY ( FK_numero_dossier ) REFERENCES  camp  ( numero_dossier ),
    PRIMARY KEY ( FK_numero_dossier, FK_niss_encadrant)
);

CREATE TABLE  demande_subside  (
    numero_dossier  int PRIMARY KEY NOT NULL,
    date_demande  timestamp,
    statut  varchar(255),
    FOREIGN KEY ( numero_dossier ) REFERENCES  camp  ( numero_dossier )
);

CREATE TABLE  decision  (
    numero_dossier  int,
    statut  ENUM ('Accorde', 'Refuse', 'Non traité'),
    agent_traitant_id  int,
    montant_subside  int,
    motivation_decision  varchar(255),
    FOREIGN KEY ( numero_dossier ) REFERENCES  demande_subside  ( numero_dossier );
    FOREIGN KEY ( agent_traitant ) REFERENCES  agentONE  ( niss );
);

CREATE TABLE  agentONE  (
    niss  int PRIMARY KEY NOT NULL,
    prenom  varchar(255),
    nom  varchar(255),
    email  varchar(255),
    telephone  varchar(255),
    FK_attribution  int,
    FOREIGN KEY ( FK_attribution ) REFERENCES  federation_mouvement_jeunesse  ( id )
);




