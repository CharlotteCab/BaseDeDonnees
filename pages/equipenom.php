<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        <?php
            print "Tournois auxquels l'équipe a participé et ses résultats.\n";
            $nEquipe = $_GET['nom'];
            ?>
            <table width=500 border=1>
            <tr>
                <td>Nom</td>
                <td>Tournoi</td>
                <td>Jeux</td>
                <td>Classement</td>
            </tr>
        <?php
            $sql = "SELECT Equipe.nomEquipe, Participe.nomTournoi, Tournoi.nomJeux, Participe.classement
            FROM Equipe, Participe, Tournoi
            WHERE Equipe.nomEquipe=Participe.nomEquipe AND Tournoi.nomTournoi=Participe.nomTournoi AND Equipe.nomEquipe='$nEquipe'";
            $result = mysqli_query($db,$sql);
            while ($get_info = $result->fetch_row()){ 
            print "<tr>\n";
            foreach ($get_info as $field)
            print "\t<td><font size=1/>$field</font></td>\n";
            print "</tr>\n";
            }
            print "</table>\n";
            $result->free();
            //$db->close();
        ?>
        <br>
        <p class="texte">Liste des Joueurs de l'Equipe: </p>
        <table width=500 border=1>
            <tr>
                <td>Pseudo</td>
                <td>Equipe</td>
                <td>Poste</td>
                <td>Jeux</td>
            </tr>
        <?php
            $sql = "SELECT * FROM Equipe_Joueurs WHERE nomEquipe='$nEquipe'";
            $result = mysqli_query($db,$sql);
            while ($get_info = $result->fetch_assoc()){ 
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