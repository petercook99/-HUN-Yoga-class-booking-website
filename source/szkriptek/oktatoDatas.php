<?php

if(isset($_POST["id"])){

   $id=$_POST["id"];

   include "connection.php";
   include "oktatoSQL.php";
   include "oktatoClass.php";
   $oktato = new OktatoContr($id);
   $oktato->oktato();
}


 ?>
