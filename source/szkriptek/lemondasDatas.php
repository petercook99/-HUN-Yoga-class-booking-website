<?php

if(isset($_POST["email"]) && isset($_POST["id"]) && isset($_POST["berlet"]) && isset($_POST["oktatoID"])){
   $id=$_POST["id"];
   $email=$_POST["email"];
   $berlet=$_POST["berlet"];
   $oktatoID=$_POST["oktatoID"];

   include "connection.php";
   include "lemondasSQL.php";
   include "lemondasClass.php";

   $lemondas= new LemondasContr($id, $email, $berlet, $oktatoID);
   $lemondas->lemondas();

}

 ?>
