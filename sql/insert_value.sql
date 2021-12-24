
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

INSERT INTO agent_one  VALUES ('91013334976','Mathias', 'ista','ista@mail.com','0471276267',1);
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

INSERT INTO decision (numero_dossier, statut, id_agent_traitant) VALUES (1,'Non traité','91013334976');
INSERT INTO decision (numero_dossier, statut, id_agent_traitant) VALUES (2,'Non traité','94421139976');
INSERT INTO decision (numero_dossier, statut, id_agent_traitant) VALUES (3,'Non traité','91553174976');
INSERT INTO decision (numero_dossier, statut, id_agent_traitant) VALUES (4,'Non traité','94678134976');
INSERT INTO decision (numero_dossier, statut, id_agent_traitant) VALUES (5,'Non traité','91553134976');

