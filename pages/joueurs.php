<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
            <?php
                print "Recherche d'un Joueur:";
                ?>
                <form method = "post">
                    <label>Pseudo du Joueur :</label><input type = "text" name = "pseudoJoueurs" id="pseudoJoueurs"/><br/>
                    <input type = "submit" value = " Rechercher "/><br />
                </form>
                <?php
                if(isset ($_POST['pseudoJoueurs'])) {
                    ?><table width=500 border=1>
                        <tr>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Pseudo</td>
                            <td>Poste</td>
                            <td>Age</td>
                            <td>Pays</td>
                            <td>Equipe</td>
                            <td>Jeux</td>
                            <td>Tournoi</td>
                            <td>Classement</td>
                        </tr><?php
                    $nj = $_POST['pseudoJoueurs'];
                    $sql = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, Joueurs.poste, Joueurs.age, Joueurs.pays, Joueurs.nomEquipe, Joueurs.nomJeux, Participe.nomTournoi, Participe.classement
                    FROM Joueurs, Participe, Tournoi
                    WHERE Joueurs.nomEquipe=Participe.nomEquipe AND Joueurs.nomJeux=Tournoi.nomJeux AND Tournoi.nomTournoi=Participe.nomTournoi AND pseudo='$nj'";
                    $result = mysqli_query($db,$sql);
                    while ($get_info = $result->fetch_assoc()){ 
                        print "<tr>\n";
                        foreach ($get_info as $field)
                        print "\t<td><font size=2/>$field</font></td>\n";
                        print "</tr>\n";
                        }
                    print "</table>\n";
                    print "<br><br>\n";
                }
            ?>
            <?php
                if(isset ($_SESSION['login_user']))
                {
                    if($_SESSION['adminlvl']==1)
                    {
                        print "Update un Joueur: ";
                        ?>
                        <form method = "post">
                            <label>Nom du Joueur :</label><input type = "text" name = "nomJoueurs" id="nomJoueurs"/><br/>
                            <label>Set  :</label><select name = "setupdate" id="setupdate"><br/>
                                <option value="nom">nom</option>
                                <option value="prenom">prenom</option>
                                <option value="pseudo" selected>pseudo</option>
                                <option value="poste">poste</option>
                                <option value="age">age</option>
                                <option value="pays">pays</option>
                            </select><br />
                            <label>Nouvelle valeure :</label><input type = "text" name = "newvalue" id="newvalue"/><br/>
                            <input type = "submit" value = " Submit "/><br />
                        </form>
                        <?php
                        if(isset ($_POST['newvalue'])) {
                            $su = $_POST['setupdate'];
                            $nv = $_POST['newvalue'];
                            $nj = $_POST['nomJoueurs'];
                            $sql = "UPDATE Joueurs
                                SET $su = '$nv'
                                WHERE Joueurs.nom='$nj'";
                            $result = mysqli_query($db,$sql);
                                
                            if(isset($result)) {
                                print "Update effectuée !";
                            }
                            else {
                                $error = "Problème avec l'update";
                                print $error;
                                echo mysqli_error($result);
                            }
                        }
                        ?><br><?php
                        print "Delete un Joueur: ";
                        ?>
                        <form method = "post">
                            <label>Nom du Joueur :</label><input type = "text" name = "nomJoueurs" id="nomJoueurs"/><br/>
                            <input type = "submit" value = " Delete "/><br />
                        </form>
                        <?php
                        if(isset ($_POST['nomJoueurs'])) {
                            $nj = $_POST['nomJoueurs'];
                            $sql = "DELETE FROM Joueurs
                                WHERE Joueurs.nom='$nj'";
                            $result = mysqli_query($db,$sql);
                                
                            if(isset($result)) {
                                print "Delete effectuée !";
                            }
                            else {
                                $error = "Problème avec l'update";
                                print $error;
                                echo mysqli_error($result);
                            }
                            ?><br><?php
                        }
                    }
                }
            ?>
        <table width=500 border=1>
            <tr>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Pseudo</td>
                <td>Poste</td>
                <td>Age</td>
                <td>Pays</td>
                <td>Equipe</td>
                <td>Jeux</td>
            </tr>
        <?php
            $sql = "SELECT nom, prenom, pseudo, poste, age, pays, nomEquipe, nomJeux FROM Joueurs
                    ORDER BY nomEquipe, nomJeux";
            $result = mysqli_query($db,$sql);
            while ($get_info = $result->fetch_row()){ 
            print "<tr>\n";
            foreach ($get_info as $field)
            print "\t<td><font size=1/>$field</font></td>\n";
            print "</tr>\n";
            }
            print "</table>\n";
            $result->free();
            $db->close();
        ?>
        </p>
    </div>
</div>

<?php include("../footer.php"); ?>