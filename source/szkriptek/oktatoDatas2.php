<?php

if(isset($_POST["id"]) && isset($_POST["tapasztalat"]) && isset($_POST["leiras"])){
   $id=$_POST["id"];
   $tapasztalat=$_POST["tapasztalat"];
   $leiras=$_POST["leiras"];
    
   include "connection.php";
   include "oktatoSQL2.php";
   include "oktatoClass2.php";

   $oktato= new OktatoSzerkContr($id, $tapasztalat, $leiras);
   $oktato->oktatoSzerkesztes();

}

 ?>