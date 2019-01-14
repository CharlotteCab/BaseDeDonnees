--Presentation--

--Ce site permet de savoir les tournois qui ont eu lieu dans le milieu de l'Esport (Tournoi sur des jeux vidéos).
--Un tournoi a pour thème un jeux.
--Une Equipe est composé de plusieurs joueurs.
--Ces joueurs ne joue qu'a un seul jeux et n'appartiennent qu'à une équipe, il y ont un poste défini.
--La table participe permet de savoir toutes les équipes qui ont participé à un tournoi et ainsi connaître leur classement.
--La table Utilisateur permet de stocker tous les inscrits au site.


--Creation des vues--

CREATE VIEW Equipe_Joueurs AS
SELECT Joueurs.pseudo, Equipe.nomEquipe, Joueurs.poste, Joueurs.nomJeux
FROM Joueurs, Equipe
WHERE Joueurs.nomEquipe=Equipe.nomEquipe
ORDER BY Equipe.nomEquipe

CREATE VIEW Participant_Tournoi AS
SELECT DISTINCT Joueurs.pseudo, Joueurs.nomEquipe, Joueurs.nomJeux, Tournoi.nomTournoi
FROM Joueurs, Participe, Tournoi
WHERE Participe.nomEquipe=Joueurs.nomEquipe AND Tournoi.nomJeux=Joueurs.nomJeux AND Participe.nomTournoi=Tournoi.nomTournoi
ORDER BY Tournoi.nomTournoi, Joueurs.nomEquipe

CREATE VIEW Utilisateurs_View AS
SELECT Utilisateur.pseudo, Utilisateur.identifiant, Utilisateur.adminUser
FROM Utilisateur


--Grant--

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';
GRANT SELECT,INSERT,UPDATE,DELETE ON EsportReady.* TO 'admin'@'localhost' WITH GRANT OPTION;

CREATE USER 'usersite'@'localhost' IDENTIFIED BY '123';
GRANT SELECT,INSERT ON EsportReady.Equipe_Joueurs,EsportReady.Tournoi,EsportReady.Participe, EsportReady.Joueurs,EsportReady.Equipe 
TO 'usersite'@'localhost';

CREATE USER 'visiteur'@'localhost' IDENTIFIED BY '456';
GRANT SELECT ON EsportReady.Equipe_Joueurs,EsportReady.Tournoi,EsportReady.Participe, EsportReady.Joueurs, EsportReady.Utilisateur
TO 'visiteur'@'localhost' WITH GRANT OPTION;

GRANT INSERT ON EsportReady.Utilisateur TO 'visiteur'@'localhost';

DROP USER 'visiteur'@'localhost'


--Requêtes--

--Joueurs qui ont 19 ans
SELECT Joueurs.pseudo, Joueurs.age
FROM Joueurs
WHERE Joueurs.age=19

--Joueurs jouant à Overwatch
SELECT Joueurs.pseudo, Equipe.nomEquipe, Joueurs.nomJeux
FROM Joueurs, Equipe
WHERE Joueurs.nomEquipe=Equipe.nomEquipe
AND Joueurs.nomJeux LIKE "Overwatch"
ORDER BY Equipe.nomEquipe

--Savoir quelle équipe a participé à au moins 4 tournoi
SELECT nomEquipe, COUNT(*) AS Nombre_Participation
FROM Participe
GROUP BY nomEquipe
HAVING COUNT(nomEquipe)>3

--Pseudo des joueurs qui n'ont participé à aucun tournoi
SELECT DISTINCT Joueurs.pseudo, Joueurs.nomEquipe, Joueurs.nomJeux
FROM Joueurs
WHERE Joueurs.pseudo NOT IN
(   
    SELECT DISTINCT Joueurs.pseudo
    FROM Joueurs, Participe, Tournoi
    WHERE Participe.nomEquipe=Joueurs.nomEquipe AND Tournoi.nomJeux=Joueurs.nomJeux
)
ORDER BY Joueurs.nomEquipe, Joueurs.nomJeux

--Qui a gagné le plus de tournoi
SELECT nomEquipe, MAX(Vic.total) AS Total_Victoire
FROM 
    (SELECT nomEquipe, COUNT(classement) AS total
    FROM Participe
    WHERE classement=1
    GROUP BY nomEquipe
    HAVING COUNT(classement)) AS Vic

--Nombre d'argent gagné par Equipe pour les tournois où ils ont fini premier
SELECT Participe.nomEquipe, SUM(Tournoi.recompense) AS Total
FROM Tournoi, Participe
WHERE Tournoi.nomTournoi=Participe.nomTournoi AND Participe.classement=1
GROUP BY Participe.nomEquipe


--Dernier tournoi organisé
SELECT Tournoi.nomTournoi, Tournoi.dateTournoi
FROM Tournoi 
ORDER BY Tournoi.dateTournoi DESC
LIMIT 1 

--Tous les joueurs qui ont le poste "Support" sur le jeux "League Of Legends"
SELECT Joueurs.pseudo, Joueurs.nomEquipe, Joueurs.poste, Joueurs.nomJeux
FROM Joueurs
WHERE Joueurs.poste LIKE "Support" AND Joueurs.nomJeux LIKE "League%"

--Joueurs qui ont le poste "Support" sur le jeux "League Of Legends" qui ont au moins gagné un tournoi
SELECT DISTINCT Joueurs.pseudo, Joueurs.nomEquipe, Joueurs.poste, Joueurs.nomJeux, Tournoi.nomTournoi
FROM Joueurs, Participe, Tournoi
WHERE Participe.nomEquipe=Joueurs.nomEquipe AND Participe.nomTournoi=Tournoi.nomTournoi AND Joueurs.poste="Support" 
    AND Joueurs.nomJeux LIKE "League%" AND Participe.classement=1 AND Tournoi.nomJeux LIKE "League%"

--Nom des Tournoi en commun où l'équipe Vitality et Fnatic participent
SELECT Participe.nomTournoi
FROM Participe
WHERE Participe.nomEquipe="Vitality"
INTERSECT
SELECT Participe.nomTournoi
FROM Participe
WHERE Participe.nomEquipe="Fnatic"
--OU 
SELECT Participe.nomTournoi
FROM Participe
WHERE Participe.nomEquipe="Vitality" AND Participe.nomTournoi IN
(
    SELECT Participe.nomTournoi
    FROM Participe
    WHERE Participe.nomEquipe="Fnatic"
)

--Connaître les Utilisateurs admin avec la view Utilisateurs_View
SELECT *
FROM Utilisateurs_View
WHERE adminUser=1

--Le nombre de joueurs par equipe à l'aide de la view Equipe_Joueurs
SELECT nomEquipe, COUNT(*) AS Nombre_de_Joueurs
FROM Equipe_Joueurs
GROUP BY nomEquipe


--Modification de Table--

ALTER TABLE Joueurs
MODIFY age int NOT NULL;

UPDATE Joueurs
SET age=age+1

UPDATE Tournoi
SET sponsor=UPPER(sponsor);

UPDATE Joueurs 
SET pays = "espagne" 
WHERE Joueurs.pseudo="HiK";

DELETE FROM Participe
WHERE Participe.nomEquipe="Cloud9" AND Participe.nomTournoi="Gamescon"
