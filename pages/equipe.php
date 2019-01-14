<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        Obtenir les résultats d'une équipe: <br>
        <form method = "get">
        <label>Nom de l'Equipe  :</label><select name = "nomEquipe" id="nomEquipe"><br/>
                        <?php
                            $sql="SELECT DISTINCT nomEquipe FROM Equipe";
                            $result=mysqli_query($db,$sql);
                            while($array[]=$result->fetch_object());
                            array_pop($array);
                            foreach($array as $field)
                            {
                                ?>
                                <option value="<?php echo $field->nomEquipe;?>"><?php echo $field->nomEquipe;?></option>
                                <?php
                            }
                            $result->free();
                        ?>
                    </select><br>
        <input type = "submit" value = " Rechercher "/><br />
        </form>
        <?php
            if(isset($_GET['nomEquipe']))
            {
                header("location: equipenom.php?nom=".$_GET['nomEquipe']."");
            }
        ?>
        <table width=500 border=1>
            <tr>
                <td>Nom</td>
                <td>Pays</td>
                <td>Sponsor</td>
                <td>Date de Création</td>
            </tr>
        <?php
            $sql = "SELECT nomEquipe, paysEquipe, sponsorEquipe, dateCreation FROM Equipe";
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