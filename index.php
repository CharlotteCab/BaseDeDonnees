<?php
    $_GLOBALS['numpage']=0;
    include('header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
            <?php
                if(isset ($_SESSION['login_user']))
                {
                    ?>Bienvenue <?php echo $login_session;
                    ?> !<br><br><?php
                    if($_SESSION['adminlvl']==1)
                    {
                        print 'Vous êtes administrateur du site !'; ?><br>

                        <table width=500 border=1>
                        <tr>
                            <td>Pseudo</td>
                            <td>Identifiant</td>
                            <td>Admin Lvl</td>
                        </tr>
                    <?php
                        $sql = "SELECT * FROM Utilisateurs_View";
                        $result = mysqli_query($db,$sql);
                        while ($get_info = $result->fetch_row()){ 
                        print "<tr>\n";
                        foreach ($get_info as $field)
                        print "\t<td><font size=1/>$field</font></td>\n";
                        print "</tr>\n";
                        }
                        print "</table>\n";
                        $result->free();

                        ?><br><?php
                    }
                }
            ?>
            EsportReady est le site qui permet de connaître les tournois qui ont lieux partout dans le monde sur n'importe quel jeux ! <br>
            Vous pouvez aussi retrouver toutes les équipes et tous les joueurs du moment.<br><br>
            <?php
                if(!isset ($_SESSION['login_user']))
                {
                    ?>Ce site est communautaire, donc si vous connaissez de nouveaux Joueurs ou Equipes sur la scène Esport, 
                    vous pouvez les ajouter en vous <a href="signin.php">créant un compte</a> et en vous <a href="login.php">connectant</a> !<br><br>
                    <?php
                }

                $sql = "SELECT nomTournoi, dateTournoi
                        FROM Tournoi 
                        ORDER BY dateTournoi DESC
                        LIMIT 1";
                $result = mysqli_query($db,$sql);
                $get_info = $result->fetch_assoc();

                print "Dernier tournoi organisé: ".$get_info['nomTournoi']." à la date du ".$get_info['dateTournoi'].".";
                
                $result->free();
                $db->close();
            ?>
        </p>
    </div>
</div>

<?php include("footer.php"); ?>