<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        <table width=500 border=1>
            <tr>
                <td>Pseudo</td>
                <td>Equipe</td>
                <td>Jeux</td>
                <td>Tournoi</td>
            </tr>
        <?php
            $sql = "SELECT * FROM Participant_Tournoi";
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