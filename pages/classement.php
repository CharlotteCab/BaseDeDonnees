<?php
    $_GLOBALS['numpage']=1;
    include('../header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        <?php
            $nTournoi = $_GET['nom'];        
            if(isset($_SESSION['login_user']))
            {
                ?>
                <form method = "post">
                    <label>1er :</label><select name = "nomEquipe" id="nomEquipe"><br/>
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
                    </select><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
                <?php
                if(isset ($_POST['nomEquipe'])) {
                
                    $sql = "INSERT INTO Participe VALUES ('$nTournoi', '".$_POST['nomEquipe']."', 1)";
                    $result = mysqli_query($db,$sql);
                        
                    if(isset($result)) {
                        print "Equipe ajoutée !";
                    }
                    else {
                        $error = "Il manque des informations !";
                        print $error;
                    }
                }
                ?>
                <form method = "post">
                    <label>2eme :</label><select name = "nomEquipe2" id="nomEquipe2"><br/>
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
                    </select><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
                <?php
                if(isset ($_POST['nomEquipe2'])) {
                
                    $sql = "INSERT INTO Participe VALUES ('$nTournoi', '".$_POST['nomEquipe2']."', 2)";
                    $result = mysqli_query($db,$sql);
                        
                    if(isset($result)) {
                        print "Equipe ajoutée !";
                    }
                    else {
                        $error = "Il manque des informations !";
                        print $error;
                    }
                }
                ?>
                <form method = "post">
                    <label>3eme :</label><select name = "nomEquipe3" id="nomEquipe3"><br/>
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
                    </select><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
                <?php
                if(isset ($_POST['nomEquipe3'])) {
                
                    $sql = "INSERT INTO Participe VALUES ('$nTournoi', '".$_POST['nomEquipe3']."', 3)";
                    $result = mysqli_query($db,$sql);
                        
                    if(isset($result)) {
                        print "Equipe ajoutée !";
                    }
                    else {
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