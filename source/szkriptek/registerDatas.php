<?php

if(isset($_POST["submit"])){

   $email=$_POST["email"];
   $pw=$_POST["pw"];
   $pwrepeat=$_POST["pwrepeat"];
   $lname=$_POST["lname"];
   $fname=$_POST["fname"];
   $phone=$_POST["phone"];

   include "connection.php";
   include "registerSQL.php";
   include "registerClass.php";
   $register = new RegContr($email, $pw, $pwrepeat, $lname, $fname, $phone);
   $register->register();
   header("location: ../index.php?hiba=nincs");
}

 ?>
