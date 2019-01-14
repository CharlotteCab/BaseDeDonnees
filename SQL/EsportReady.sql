CREATE TABLE Jeux(
    nomJeux VARCHAR(30) NOT NULL,
    typeJeux VARCHAR(30) NOT NULL,
    developper VARCHAR(30) NOT NULL,
    PRIMARY KEY (nomJeux)
);

CREATE TABLE Tournoi(
    nomTournoi VARCHAR(30) NOT NULL,
    dateTournoi date NOT NULL,
    lieux VARCHAR(30) NOT NULL,
    sponsor VARCHAR(30),
    recompense INT(3),
    nomJeux VARCHAR(30) NOT NULL,
    PRIMARY KEY (nomTournoi),
    FOREIGN KEY (nomJeux) REFERENCES Jeux (nomJeux)
);

CREATE TABLE Utilisateur(
    identifiant INT(2) NOT NULL AUTO_INCREMENT,
    mdp VARCHAR(30) NOT NULL,
    pseudo VARCHAR(30) NOT NULL,
    adminUser TINYINT(2) NOT NULL,
    PRIMARY KEY (identifiant)
);

CREATE TABLE Equipe(
    nomEquipe VARCHAR(30) NOT NULL,
    paysEquipe VARCHAR(30) NOT NULL,
    sponsorEquipe VARCHAR(30),
    dateCreation date,
    idUtilisateurEquipe INT(2),
    PRIMARY KEY (nomEquipe),
    FOREIGN KEY (idUtilisateurEquipe) REFERENCES Utilisateur (identifiant)
);

CREATE TABLE Joueurs(
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    pseudo VARCHAR(30) NOT NULL,
    poste VARCHAR(30),
    age INT(2) NOT NULL,
    pays VARCHAR(30) NOT NULL,
    nomEquipe VARCHAR(30) NOT NULL,
    nomJeux VARCHAR(30) NOT NULL,
    idUtilisateurJoueurs INT(2),
    PRIMARY KEY (nom),
    FOREIGN KEY (nomEquipe) REFERENCES Equipe (nomEquipe),
    FOREIGN KEY (nomJeux) REFERENCES Jeux (nomJeux),
    FOREIGN KEY (idUtilisateurJoueurs) REFERENCES Utilisateur (identifiant)
);

CREATE TABLE Participe(
    nomTournoi VARCHAR(30) NOT NULL,
    nomEquipe VARCHAR(30) NOT NULL,
    classement INT(1) NOT NULL,
    PRIMARY KEY (nomTournoi, nomEquipe),
    FOREIGN KEY (nomTournoi) REFERENCES Tournoi (nomTournoi),
    FOREIGN KEY (nomEquipe) REFERENCES Equipe (nomEquipe)
);

INSERT INTO Jeux VALUES ("Overwatch", "FPS", "Blizzard"),
("PUBG", "BR", "BlueHole"),
("League Of Legends", "MOBA", "Riot"),
("Fortinite", "BR", "EpicGames"),
("Call Of Duty", "FPS", "Activision"),
("Trackmania", "Jeu de Course", "Nadeo"),
("World Of Warcraft", "MMO", "Blizzard"),
("Starcraft", "RTS", "Blizzard"),
("Battlerite", "MOBA", "Stunlock Studios"),
("Tekken", "Combat", "Namco");

INSERT INTO Tournoi VALUES ("LyonEsport", "2016/05/8", "France", "Orange", NULL, "Overwatch"),
("PGW", "2017/11/13", "France", NULL, 150, "PUBG"),
("Gamescon", "2016/03/1", "Allemagne", NULL, 200, "Starcraft"),
("E3", "2014/01/14", "Etats-Unis", NULL, NULL, "League Of Legends");

INSERT INTO Utilisateur (mdp,pseudo,adminUser) VALUES ("fhuadija48", "DarkCounter",0),
("cha0","charlotte",1);

INSERT INTO Equipe VALUES ("Vitality", "France", "Coca-Cola", "2001/12/15", NULL),
("Fnatic", "Royaume-Unis", "Deezer", "2003/04/17", NULL),
("Cloud9", "Etats-Unis", "Twitch", "2011/05/28", NULL),
("G2-Esport", "Espagne", "Logitech", "2006/09/17", NULL),
("TeamLiquid", "Pays-Bas", "Alienware", "2009/08/27", NULL),
("Millenium", "France", "Wearefans", "2011/09/24", NULL);

INSERT INTO Joueurs VALUES ("Bower", "Roger", "HiK", NULL, 21, "Suisse", "Vitality", "Starcraft", NULL),
("Craister", "Dorree", "dcraister0", NULL, 23, "Royaume-Unis", "Vitality", "Tekken", NULL),
("Matzl", "Keary", "kmatzl1", NULL, 19, "Maroc", "Vitality", "Trackmania", NULL),
("Scaplehorn", "Carlotta", "cscaplehorn2", "Support", 25, "Etats-Unis", "Vitality", "League Of Legends", NULL),
("Fitzhenry", "Karlotte", "kfitzhenry3", "ADC", 21, "Suisse", "Vitality", "League Of Legends", NULL),
("MacAlpin", "Ambrosi", "amacalpin0", "Mid", 20, "Kazakhstan", "Vitality", "League Of Legends", NULL),
("Fandrich", "Perle", "pfandrich1", "Top", 18, "Philippines", "Vitality", "League Of Legends", NULL),
("Fourmy", "Adelina", "afourmy2", "Jungle", 20, "Vietnam", "Vitality", "League Of Legends", NULL),
("Zink", "Aland", "azink3", NULL, 24, "Nigeria", "Vitality", "PUBG", NULL),
("Tschursch", "Chanda", "ctschursch4", NULL, 26, "Colombia", "Vitality", "PUBG", NULL),
("Van Hault", "Poul", "pvanhault5", NULL, 28, "Brazil", "Vitality", "World Of Warcraft", NULL),
("Hutcheons", "Rick", "rhutcheons6", "Support", 24, "Poland", "Vitality", "Overwatch", NULL),
("Demare", "Angelika", "ademare7", "Support", 25, "China", "Vitality", "Overwatch",  NULL),
("Havercroft", "Benedetto", "bhavercroft8", "DPS", 23, "Indonesia", "Vitality", "Overwatch", NULL),
("Ledington", "Cherice", "cledington9", "DPS", 22, "Congo", "Vitality", "Overwatch", NULL),
("Currington", "Gale", "gcurringtona", "Tank", 29, "Peru", "Vitality", "Overwatch", NULL),
("Vannoort", "Bron", "bvannoortb", "Tank", 21, "China", "Vitality", "Overwatch", NULL),
("Boland", "Witty", "wbolandc", NULL, 22, "Israel", "Fnatic", "Starcraft", NULL),
("Gillingwater", "Ellary", "egillingwaterd", NULL, 31, "Indonesia", "Fnatic", "Tekken", NULL),
("Glading", "Adair", "agladinge", NULL, 18, "China", "Fnatic", "Trackmania", NULL),
("Gentric", "Maurine", "mgentricf", "Support", 23, "Israel", "Fnatic", "League Of Legends", NULL),
("Paffley", "Glenna", "gpaffleyg", "ADC", 25, "Poland", "Fnatic", "League Of Legends", NULL),
("Tiddeman", "Lawrence", "ltiddemanh", "Mid", 26, "Colombia", "Fnatic", "League Of Legends", NULL),
("Cluelow", "Roxy", "rcluelowi", "Top", 24, "Brazil", "Fnatic", "League Of Legends", NULL),
("Lowis", "Janek", "jlowisj", "Jungle", 25, "France", "Fnatic", "League Of Legends", NULL),
("Mattis", "Eleanora", "emattisk", NULL, 19, "China", "Fnatic", "PUBG", NULL),
("Powlesland", "Ebba", "epowleslandl", NULL, 22, "Nigeria", "Fnatic", "PUBG", NULL),
("Shute", "Chelsy", "cshutem", NULL, 22, "Nicaragua", "Fnatic", "World Of Warcraft", NULL),
("Gander", "Cass", "cgandern", "Support", 21, "Indonesia", "Fnatic", "Overwatch", NULL),
("Taillard", "Kirsti", "ktaillardo", "Support", 24, "Tanzania", "Fnatic", "Overwatch", NULL),
("Hitzschke", "Donia", "dhitzschkep", "DPS", 23, "South Africa", "Fnatic", "Overwatch", NULL),
("Chrystal", "Minna", "mchrystalq", "DPS", 21, "Costa Rica", "Fnatic", "Overwatch", NULL),
("Matashkin", "Zed", "zmatashkinr", "Tank", 22, "Poland", "Fnatic", "Overwatch", NULL),
("Shyre", "Hughie", "hshyres", "Tank", 24, "Indonesia", "Fnatic", "Overwatch", NULL),
("Baggiani", "Gratiana", "gbaggianit", NULL, 25, "Philippines", "Cloud9", "Starcraft", NULL),
("Sheen", "Rafael", "rsheenu", NULL, 26, "Colombia", "Cloud9", "Tekken", NULL),
("Victoria", "Adlai", "avictoriav", NULL, 22, "Indonesia", "Cloud9", "Trackmania", NULL),
("Matthis", "Edmon", "ematthisw", "Support", 21, "Portugal", "Cloud9", "League Of Legends", NULL),
("Kulver", "Georgie", "gkulverx", "ADC", 30, "Estonia", "Cloud9", "League Of Legends", NULL),
("Walesa", "Honey", "hwalesay", "Mid", 25, "Indonesia", "Cloud9", "League Of Legends", NULL),
("Jest", "Ilse", "ijestz", "Top", 22, "Indonesia", "Cloud9", "League Of Legends", NULL),
("Crunkhurn", "Rebecca", "rcrunkhurn10", "Jungle", 28, "Philippines", "Cloud9", "League Of Legends", NULL),
("Steinor", "Ashia", "asteinor11", NULL, 22, "Poland", "Cloud9", "PUBG", NULL),
("Lenglet", "Dannie", "dlenglet12", NULL, 27, "Indonesia", "Cloud9", "PUBG", NULL),
("Monelli", "Frans", "fmonelli13", NULL, 25, "Bulgaria", "Cloud9", "World Of Warcraft", NULL),
("Ilymanov", "Thaxter", "tilymanov14", "Support", 24, "China", "Cloud9", "Overwatch", NULL),
("Ambrogio", "Pip", "pambrogio15", "Support", 32, "Indonesia", "Cloud9", "Overwatch", NULL),
("Cockings", "Maryrose", "mcockings16", "DPS", 28, "Somalia", "Cloud9", "Overwatch", NULL),
("Bowen", "Lavinie", "lbowen17", "DPS", 22, "Luxembourg", "Cloud9", "Overwatch", NULL),
("Sturton", "Maureen", "msturton18", "Tank", 23, "China", "Cloud9", "Overwatch", NULL),
("Lehrmann", "Sergio", "slehrmann19", "Tank", 21, "Croatia", "Cloud9", "Overwatch", NULL),
("Spadollini", "Ranique", "rspadollini1a", NULL, 25, "France", "G2-Esport", "Starcraft", NULL),
("Quye", "Roxie", "rquye1b", NULL, 25, "Russia", "G2-Esport", "Overwatch", NULL),
("Milburn", "Tripp", "tmilburn1c", NULL, 25, "Argentina", "G2-Esport", "Tekken", NULL),
("Jakubovicz", "Klara", "kjakubovicz1d", NULL, 22, "Argentina", "G2-Esport", "Trackmania", NULL),
("Falkner", "Dory", "dfalkner1e", "Support", 26, "Denmark", "G2-Esport", "League Of Legends", NULL),
("Kinnerk", "Osbourn", "okinnerk1f", "ADC", 29, "Panama", "G2-Esport", "League Of Legends", NULL),
("Watsam", "Orlando", "owatsam1g", "Mid", 21, "China", "G2-Esport", "League Of Legends", NULL),
("Kieran", "August", "akieran1h", "Top", 22, "Micronesia", "G2-Esport", "League Of Legends", NULL),
("MacKey", "Orsa", "omackey1i", "Jungle", 28, "United States", "G2-Esport", "League Of Legends", NULL),
("Eich", "Vincents", "veich1j", NULL, 22, "Serbia", "G2-Esport", "PUBG", NULL),
("St. Clair", "Shanan", "sstclair1k", NULL, 18, "Philippines", "G2-Esport", "PUBG", NULL),
("Belsham", "Loralee", "lbelsham1l", NULL, 19, "Greece", "G2-Esport", "World Of Warcraft", NULL),
("Howchin", "Patricio", "phowchin1m", "Support", 20, "Philippines", "G2-Esport", "Overwatch", NULL),
("Pendlington", "Clarke", "cpendlington1n", "Support", 26, "China", "G2-Esport", "Overwatch", NULL),
("Pfeffel", "Therine", "tpfeffel1o", "DPS", 22, "France", "G2-Esport", "Overwatch", NULL),
("Robbie", "Flory", "frobbie1p", "DPS", 25, "Philippines", "G2-Esport", "Overwatch", NULL),
("Sketchley", "Ossie", "osketchley1q", "Tank", 25, "China", "G2-Esport", "Overwatch", NULL),
("McDoual", "Laural", "lmcdoual1r", NULL, 23, "Serbia", "TeamLiquid", "Starcraft", NULL),
("Sybry", "Berne", "bsybry1s", NULL, 21, "China", "TeamLiquid", "Tekken", NULL),
("Senechell", "Ingemar", "isenechell1t", NULL, 21, "Mexico", "TeamLiquid", "Trackmania", NULL),
("Shellsheere", "Sarajane", "sshellsheere1u", "Support", 22, "France", "TeamLiquid", "League Of Legends", NULL),
("Ipsgrave", "Melloney", "mipsgrave1v", "ADC", 26, "China", "TeamLiquid", "League Of Legends", NULL),
("Farherty", "Philly", "pfarherty1w", "Mid", 26, "Gabon", "TeamLiquid", "League Of Legends", NULL),
("Aubin", "Midge", "maubin1x", "Top", 22, "Thailand", "TeamLiquid", "League Of Legends", NULL),
("Sheals", "Eduard", "esheals1y", "Jungle", 25, "Russia", "TeamLiquid", "League Of Legends", NULL),
("Arnoll", "Florina", "farnoll1z", NULL, 22,  "China", "TeamLiquid", "PUBG", NULL),
("Lismer", "Orazio", "olismer20", NULL, 25, "Canada", "TeamLiquid", "PUBG", NULL),
("O""Noland", "Carolee", "conoland21", NULL, 23, "Indonesia", "TeamLiquid", "World Of Warcraft", NULL),
("Diter", "Daryl", "dditer22", "Tank", 28, "Spain", "TeamLiquid", "Overwatch", NULL),
("Dawber", "Egbert", "edawber23", "DPS", 29, "China", "TeamLiquid", "Overwatch", NULL),
("Spehr", "Jesus", "jspehr24", "DPS", 24, "China", "TeamLiquid", "Overwatch", NULL),
("Normant", "Alane", "anormant25", "Support", 26, "Macedonia", "TeamLiquid", "Overwatch", NULL),
("Mangeney", "Dareen", "dmangeney26", "Support", 25,  "Poland", "TeamLiquid", "Overwatch", NULL),
("Brook", "Kellie", "kbrook27", "Tank", 29, "Sweden", "TeamLiquid","Overwatch",  NULL),
("MacScherie", "Roanne", "rmacscherie28", NULL, 21, "Brazil", "Millenium", "Starcraft", NULL),
("Wreakes", "Marshall", "mwreakes29", NULL, 29, "Cayman Islands", "Millenium", "Tekken", NULL),
("Millson", "Kippie", "kmillson2a", NULL, 20, "Denmark", "Millenium", "Trackmania", NULL),
("Ofener", "Hedda", "hofener2b", "Support", 20, "Iran", "Millenium", "League Of Legends", NULL),
("Petrussi", "Brewer", "bpetrussi2c", "ADC", 30, "Indonesia", "Millenium", "League Of Legends", NULL),
("Dole", "Twila", "tdole2d", "Mid", 26, "China", "Millenium", "League Of Legends", NULL),
("Figin", "Hulda", "hfigin2e", "Top", 25, "China", "Millenium", "League Of Legends", NULL),
("Flaunders", "Celka", "cflaunders2f", "Jungle", 28, "Sweden", "Millenium", "League Of Legends", NULL),
("Szymanzyk", "Tadio", "tszymanzyk2g", NULL, 35,  "China", "Millenium", "PUBG", NULL),
("Gunner", "Therine", "tgunner2h", NULL, 25,  "Canada", "Millenium", "PUBG", NULL),
("Dibner", "Killie", "kdibner2i", NULL, 24, "China", "Millenium", "World Of Warcraft", NULL),
("Ellingworth", "Ameline", "aellingworth2j", "DSP", 20, "China", "Millenium", "Overwatch", NULL),
("Trewhitt", "Lotty", "ltrewhitt2k", "DPS", 20, "China", "Millenium", "Overwatch", NULL),
("Hardisty", "Hedvige", "hhardisty2l", "Support", 19, "Ukraine", "Millenium", "Overwatch", NULL),
("Hanselmann", "Goober", "ghanselmann2m", "Support", 25, "China", "Millenium", "Overwatch", NULL),
("Henrichsen", "Bunny", "bhenrichsen2n", "Tank", 23, "China", "Millenium", "Overwatch", NULL),
("Dunbobin", "Palmer", "pdunbobin2o", "Tank", 22, "Paraguay", "Millenium", "Overwatch", NULL);

INSERT INTO Participe VALUES ("LyonEsport", "Vitality", 1),
("LyonEsport", "Millenium", 2),
("LyonEsport", "Fnatic", 3),
("LyonEsport", "Cloud9", 4),
("PGW", "TeamLiquid", 1),
("PGW", "Fnatic", 2),
("PGW", "Cloud9", 3),
("PGW", "Vitality", 4),
("PGW","G2-Esport",5),
("Gamescon", "Millenium", 1),
("Gamescon", "G2-Esport", 2),
("Gamescon", "TeamLiquid", 3),
("Gamescon", "Vitality", 4),
("Gamescon", "Fnatic", 5),
("Gamescon", "Cloud9", 6),
("E3", "Millenium", 1),
("E3", "Cloud9", 2),
("E3", "Fnatic", 3),
("E3", "G2-Esport", 4);