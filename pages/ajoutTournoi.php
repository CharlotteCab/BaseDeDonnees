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
                ?>
                <form method = "post">
                    <label>Nom du Tournoi  :</label><input type = "text" name = "nomTournoi" id="nomTournoi"/><br/>
                    <label>Date du Tournoi  :</label><input type = "date" name = "dateTournoi" id="dateTournoi"/><br/>
                    <label>Lieux  :</label><input type = "text" name = "lieux" id="lieux"/><br/>
                    <label>Sponsor  :</label><input type = "text" name = "sponsor" id="sponsor"/><br/>
                    <label>Jeux  :</label><select name="nomJeux" id="nomJeux"><br/>
                        <?php
                            unset($array);
                            $sql="SELECT nomJeux FROM Jeux";
                            $result=mysqli_query($db,$sql);
                            while($array[]=$result->fetch_object());
                            array_pop($array);
                            foreach($array as $field)
                            {
                                ?>
                                <option value="<?php echo $field->nomJeux;?>"><?php echo $field->nomJeux;?></option>
                                <?php
                            }
                            $result->free();
                        ?>
                        </select><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
                <?php
                if(isset ($_POST['nomTournoi'])) {
                
                    $sql = "INSERT INTO Tournoi VALUES ('".$_POST['nomTournoi']."', '".$_POST['dateTournoi']."', '".$_POST['lieux']."', '".$_POST['sponsor']."', 
                    NULL, '".$_POST['nomJeux']."')";
                    $result = mysqli_query($db,$sql);
                        
                    if(isset($result)) {
                        print "Tournoi ajouté !";
                    }else {
                        $error = "Il manque des informations !";
                        print $error;
                    }
                    $db->close();
                }
            }
        ?>
        </p>
    </div>
</div>

<?php include("../footer.php"); ?>