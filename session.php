<?php
   include('config.php');
   session_start();

   if(isset ($_SESSION['login_user']))
   {
    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db,"SELECT pseudo from Utilisateur where pseudo = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['pseudo'];

      if($_SESSION['adminlvl']==1)
      {
         $_GLOBALS['DB_USERNAME']='admin';
         $_GLOBALS['DB_PASSWORD']='admin';
         $db = mysqli_connect(DB_SERVER,$_GLOBALS['DB_USERNAME'],$_GLOBALS['DB_PASSWORD'],DB_DATABASE);
         if ($db->connect_errno){
            die("Couldn't connect to MySQL ".$link->connect_error);
            }
      }
      else
      {
         $_GLOBALS['DB_USERNAME']='usersite';
         $_GLOBALS['DB_PASSWORD']='123';
         $db = mysqli_connect(DB_SERVER,$_GLOBALS['DB_USERNAME'],$_GLOBALS['DB_PASSWORD'],DB_DATABASE);
         if ($db->connect_errno){
            die("Couldn't connect to MySQL ".$link->connect_error);
            }
      }
    }
?>