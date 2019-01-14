<?php
    include('session.php');
    if(isset ($_SESSION['login_user']))
    {
        if((isset ($_GLOBALS['numpage'])) && ($_GLOBALS['numpage']==0))
        {
            ?>
            <!DOCTYPE html>
            <html lang="">
            <head>
            <title>Esport Ready</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link href="style.css" rel="stylesheet" type="text/css" media="all">
            <link rel="icon" type="EsportReady.png" href="EsportReady.png" />
            </head>
            <body>
                <header id="header" class="hoc clear"> 
                    <div id="logo" class="quick_left">
                    <p><a href="index.php"><img src="EsportReady.png" alt="Esport Ready" style="width:60%;"></a></p>
                    <p>Toute l'info des Tournoi Esport</p>
                    </div>
                </header>
            <nav id="mainav" class="hoc clear"> 
                <ul class="clear">
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href='pages/equipe.php'>EQUIPE</a></li>
                <li><a class="drop" href='pages/joueurs.php'>JOUEURS</a>
                    <ul>
                    <li><a href="pages/partJoueur.php">Participation des Joueurs</a></li>
                    </ul>
                </li>
                <li><a href='pages/jeux.php'>JEUX</a></li>
                <li><a class="drop" href='pages/tournoi.php'>TOURNOI</a>
                    <ul>
                    <li><a href="pages/result.php">Resultats Tournoi</a></li>
                    <li><a href="pages/ajoutTournoi.php">Ajouter un Tournoi</a></li>
                    </ul>
                </li>
                <li><a href='pages/ajoutJoueur.php'>Ajouter un Joueur</a></li>
                <li><a href='pages/ajoutEquipe.php'>Ajouter une Equipe</a></li>
                <li><a href='logout.php'>Deconnexion</a></li>
                </ul>
            </nav>
            <?php
        }
        else
        {
            ?>
            <!DOCTYPE html>
            <html lang="">
            <head>
            <title>Esport Ready</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link href="../style.css" rel="stylesheet" type="text/css" media="all">
            <link rel="icon" type="EsportReady.png" href="../EsportReady.png" />
            </head>
            <body>
                <header id="header" class="hoc clear"> 
                    <div id="logo" class="quick_left">
                    <p><a href="../index.php"><img src="../EsportReady.png" alt="Esport Ready" style="width:60%;"></a></p>
                    <p>Toute l'info des Tournoi Esport</p>
                    </div>
                </header>
            <nav id="mainav" class="hoc clear"> 
                <ul class="clear">
                <li><a href="../index.php">ACCUEIL</a></li>
                <li><a href='equipe.php'>EQUIPE</a></li>
                <li><a class="drop" href='joueurs.php'>JOUEURS</a>
                    <ul>
                    <li><a href="partJoueur.php">Participation des Joueurs</a></li>
                    </ul>
                </li>
                <li><a href='jeux.php'>JEUX</a></li>
                <li><a class="drop" href='tournoi.php'>TOURNOI</a>
                    <ul>
                    <li><a href="result.php">Resultats Tournoi</a></li>
                    <li><a href="ajoutTournoi.php">Ajouter un Tournoi</a></li>
                    </ul>
                </li>
                <li><a href='ajoutJoueur.php'>Ajouter un Joueur</a></li>
                <li><a href='ajoutEquipe.php'>Ajouter une Equipe</a></li>
                <li><a href='../logout.php'>Deconnexion</a></li>
                </ul>
            </nav>
            <?php
        }
    }
    else
    {
        if((isset ($_GLOBALS['numpage'])) && ($_GLOBALS['numpage']==0))
        {
            ?>
            <!DOCTYPE html>
            <html lang="">
            <head>
            <title>Esport Ready</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link href="style.css" rel="stylesheet" type="text/css" media="all">
            <link rel="icon" type="EsportReady.png" href="EsportReady.png" />
            </head>
            <body>
                <header id="header" class="hoc clear"> 
                    <div id="logo" class="quick_left">
                    <p><a href="index.php"><img src="EsportReady.png" alt="Esport Ready" style="width:60%;"></a></p>
                    <p>Toute l'info des Tournoi Esport</p>
                    </div>
                </header>
            <nav id="mainav" class="hoc clear"> 
                <ul class="clear">
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href='pages/equipe.php'>EQUIPE</a></li>
                <li><a class="drop" href='pages/joueurs.php'>JOUEURS</a>
                    <ul>
                    <li><a href="pages/partJoueur.php">Participation des Joueurs</a></li>
                    </ul>
                </li>
                <li><a href='pages/jeux.php'>JEUX</a></li>
                <li><a class="drop" href='pages/tournoi.php'>TOURNOI</a>
                    <ul>
                    <li><a href="pages/result.php">Resultats Tournoi</a></li>
                    </ul>
                </li>
                <li><a href='login.php'>Connexion</a></li>
                <li><a href='signin.php'>Inscription</a></li>
                </ul>
            </nav>
            <?php
        }
        else
        {
            ?>
            <!DOCTYPE html>
            <html lang="">
            <head>
            <title>Esport Ready</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link href="../style.css" rel="stylesheet" type="text/css" media="all">
            <link rel="icon" type="EsportReady.png" href="../EsportReady.png" />
            </head>
            <body>
                <header id="header" class="hoc clear"> 
                    <div id="logo" class="quick_left">
                    <p><a href="../index.php"><img src="../EsportReady.png" alt="Esport Ready" style="width:60%;"></a></p>
                    <p>Toute l'info des Tournoi Esport</p>
                    </div>
                </header>
            <nav id="mainav" class="hoc clear"> 
                <ul class="clear">
                <li><a href="../index.php">ACCUEIL</a></li>
                <li><a href='equipe.php'>EQUIPE</a></li>
                <li><a class="drop" href='joueurs.php'>JOUEURS</a>
                    <ul>
                    <li><a href="partJoueur.php">Participation des Joueurs</a></li>
                    </ul>
                </li>
                <li><a href='jeux.php'>JEUX</a></li>
                <li><a class="drop" href='tournoi.php'>TOURNOI</a>
                    <ul>
                    <li><a href="result.php">Resultats Tournoi</a></li>
                    </ul>
                </li>
                <li><a href='../login.php'>Connexion</a></li>
                <li><a href='../signin.php'>Inscription</a></li>
                </ul>
            </nav>
            <?php
        }
    }

?>