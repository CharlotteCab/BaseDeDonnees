<?php
    $_GLOBALS['numpage']=0;
    include('header.php');
?>

<div class="overlay">
    <div class="hoc clear"> 
        <p class="texte">
        <?php                
            if(isset ($_POST['pseudo'])) {
                // username and password sent from form 
                
                $myusername = $_POST['pseudo'];
                $mypassword = $_POST['mdp'];
                
                $sql = "SELECT * FROM Utilisateur WHERE pseudo = '".$myusername."' and mdp = '".$mypassword."'";
                $result = mysqli_query($db,$sql);
                $count = mysqli_num_rows($result);
                
                $row=$result->fetch_assoc();
                // If result matched $myusername and $mypassword, table row must be 1 row
                    
                if($count == 1) {
                    $_SESSION['login_user'] = $myusername;
                    $_SESSION['adminlvl'] = $row['adminUser'];
                    $_SESSION['idUser'] = $row['identifiant'];
                    header("location: index.php");
                }else {
                    $error = "Your Login Name or Password is invalid";
                    print $error;
                }
                $result->free();
            }
            else
            {
                ?>
                <form method = "post">
                    <label>Pseudo  :</label><input type = "text" name = "pseudo" id="pseudo"/><br/><br />
                    <label>Mot de Passe  :</label><input type = "password" name = "mdp" id="pseudo"/><br/><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
                <?php
            }
            $db->close();
        ?>
        </p>
    </div>
</div>

<?php include("footer.php"); ?>

