<?php

if(isset($_POST["submit"])){

   $email=$_POST["email"];
   $pw=$_POST["pw"];

   if($email=="admin@admin.com" && $pw=="admin"){
      session_start();
      $_SESSION["admin"] = true;
      $_SESSION["kernev"] = "Admin";
   }
   else{
      include "connection.php";
      include "loginSQL.php";
      include "loginClass.php";
      $login = new LoginContr($email, $pw);
      $login->login();
   }
      header("location: ../index.php?hiba=nincs");
}

 ?>
