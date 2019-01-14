<?php
   $_GLOBALS['DB_USERNAME']='visiteur';
   $_GLOBALS['DB_PASSWORD']='456';
   define('DB_SERVER', 'localhost');
   define('DB_DATABASE', 'EsportReady');
   $db = mysqli_connect(DB_SERVER,$_GLOBALS['DB_USERNAME'],$_GLOBALS['DB_PASSWORD'],DB_DATABASE);
   if ($db->connect_errno){
      die("Couldn't connect to MySQL ".$link->connect_error);
      }
?>