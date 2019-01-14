<?php
    $_GLOBALS['numpage']=0;
    include('header.php');
?>
<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
            <form method = "post">
                <label>Pseudo  :</label><input type = "text" name = "pseudo" id="pseudo"/><br/>
                <label>Mot de Passe  :</label><input type = "password" name = "mdp" id="mdp"/><br/>
                <label>Confirmer le Mot de Passe  :</label><input type = "password" name = "confmdp" id="confmdp"/><br/>
                <input type = "submit" value = " Submit "/><br />
            </form>
            <?php
            if(isset ($_POST['pseudo'])) {
                if($_POST['mdp']==$_POST['confmdp'])
                {
                    $sql = "INSERT INTO Utilisateur (mdp,pseudo,adminUser) VALUES ('".$_POST['mdp']."', '".$_POST['pseudo']."',0)";
                    $result = mysqli_query($db,$sql);
                        
                    if(isset($result)) {
                        header("location: index.php");
                    }else {
                        $error = "Erreur dans l'inscription";
                        print $error;
                    }
                    $result->free();
                    $db->close();
                }
                else
                {
                    print "Correspondance Mot de passe fausse";
                }
            }
        ?>
        </p>
    </div>
</div>
<?php
    include('footer.php');
?>