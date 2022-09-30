<?php

if(isset($_POST["submit"])){
   $email=$_POST["email"];
   $oktato=$_POST["oktato"];
   $alkalmak=$_POST["alkalmak"];

   include "connection.php";
   include "berletSQL.php";
   include "berletClass.php";
   $berlet = new BerletContr($email, $oktato, $alkalmak);
   $berlet->berlet();
}

 ?>
