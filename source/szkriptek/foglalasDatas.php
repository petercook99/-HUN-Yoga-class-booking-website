<?php

if(isset($_POST["submit"])){
   $email=$_POST["email"];
   $oktatoID=$_POST["oktatoID"];
   $foglalasID=$_POST["foglalasID"];
   $mod=$_POST["mod"];
   $alkalmak=$_POST["alkalmak"];

   include "connection.php";
   include "foglalasSQL.php";
   include "foglalasClass.php";

   $foglalas= new FoglalasContr($email, $oktatoID, $foglalasID, $mod, $alkalmak);
   $foglalas->foglalas();

}

 ?>
