<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        <?php
            $sql = "SELECT nomEquipe, MAX(Vic.total) AS Total_Victoire
                    FROM 
                        (SELECT nomEquipe, COUNT(classement) AS total
                        FROM Participe
                        WHERE classement=1
                        GROUP BY nomEquipe
                        HAVING COUNT(classement)) AS Vic";
            $result = mysqli_query($db,$sql);
            $get_info = $result->fetch_assoc();

            print "L'équipe qui a gagné le plus de tournoi est ".$get_info['nomEquipe']." avec ".$get_info['Total_Victoire']." victoires.";
            
            $result->free();
        ?>
        <table width=500 border=1>
            <tr>
                <td>Tournoi</td>
                <td>Equipe</td>
                <td>Position</td>
            </tr>
        <?php
            $sql = "SELECT * FROM Participe ORDER BY nomTournoi,classement";
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
