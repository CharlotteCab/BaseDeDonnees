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
                    <label>Nom de l'Equipe  :</label><input type = "text" name = "nomEquipe" id="nomEquipe"/><br/>
                    <label>Pays  :</label><input type = "text" name = "paysEquipe" id="paysEquipe"/><br/>
                    <label>Sponsor  :</label><input type = "text" name = "sponsorEquipe" id="sponsorEquipe"/><br/>
                    <label>Date de Creation  :</label><input type = "date" name = "dateCreation" id="dateCreation"/><br/>
                    <input type = "submit" value = " Submit "/><br />
                </form>
                <?php
                if(isset ($_POST['nomEquipe'])) {
                
                    $sql = "INSERT INTO Equipe VALUES ('".$_POST['nomEquipe']."', '".$_POST['paysEquipe']."', '".$_POST['sponsorEquipe']."', 
                    '".$_POST['dateCreation']."', '".$_SESSION['idUser']."')";
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
