<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        <?php
            if(isset($_SESSION['login_user']))
            {
                if($_SESSION['adminlvl']==1)
                {
                    ?>
                    <form method = "get">
                    <label>Nom du Tournoi  :</label><select name = "nomTournoi" id="nomTournoi"><br/>
                                    <?php
                                        $sql="SELECT nomTournoi FROM Tournoi";
                                        $result=mysqli_query($db,$sql);
                                        while($array[]=$result->fetch_object());
                                        array_pop($array);
                                        foreach($array as $field)
                                        {
                                            ?>
                                            <option value="<?php echo $field->nomTournoi;?>"><?php echo $field->nomTournoi;?></option>
                                            <?php
                                        }
                                        $result->free();
                                    ?>
                                </select><br>
                    <input type = "submit" value = " Faire le Classement "/><br />
                    </form>
                    <?php
                        if(isset($_GET['nomTournoi']))
                        {
                            header("location: classement.php?nom=".$_GET['nomTournoi']."");
                        }
                }
            }
        ?>
        <table width=500 border=1>
            <tr>
                <td>nom Tournoi</td>
                <td>Date</td>
                <td>Lieux</td>
                <td>Sponsor</td>
                <td>Recompenses</td>
                <td>Jeux</td>
            </tr>
        <?php
            $sql = "SELECT * FROM Tournoi";
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

