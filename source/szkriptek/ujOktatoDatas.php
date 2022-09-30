<?php

if(isset($_POST["submit"])){
  $vnev=$_POST["vnev"];
  $knev=$_POST["knev"];
  $email=$_POST["email"];
  $jelszo=$_POST["jelszo"];
  $tapasztalat=$_POST["tapasztalat"];
  $leiras=$_POST["leiras"];

  include "connection.php";
  include "ujOktatoSQL.php";
  include "ujOktatoClass.php";
  $uj = new UjOktContr($vnev, $knev, $email, $jelszo, $tapasztalat, $leiras);
  $uj->oktato();
}

 ?>
