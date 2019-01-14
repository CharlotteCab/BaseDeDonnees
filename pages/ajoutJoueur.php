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
                    <label>Pseudo  :</label><input type = "text" name = "pseudo" id="pseudo"/><br/>
                    <label>Nom  :</label><input type = "text" name = "nom" id="nom"/><br/>
                    <label>Prenom  :</label><input type = "text" name = "prenom" id="prenom"/><br/>
                    <label>Age  :</label><input type = "text" name = "age" id="age"/><br/>
                    <label>Pays  :</label><input type = "text" name = "pays" id="pays"/><br/>
                    <label>Poste  :</label><input type = "text" name = "poste" id="poste"/><br/>
                    <label>Equipe  :</label><select name = "nomEquipe" id="nomEquipe"><br/>
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
                if(isset ($_POST['pseudo'])) {
                
                    $sql = "INSERT INTO Joueurs VALUES ('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['pseudo']."', '".$_POST['poste']."', 
                    '".$_POST['age']."', '".$_POST['pays']."', '".$_POST['nomEquipe']."', '".$_POST['nomJeux']."', '".$_SESSION['idUser']."')";
                    $result = mysqli_query($db,$sql);
                        
                    if(isset($result)) {
                        print "Joueur ajouté !";
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