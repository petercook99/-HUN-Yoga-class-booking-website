<?php

if(isset($_POST["submit"])){
  $nev=$_POST["nev"];
  $leiras=$_POST["leiras"];

  include "connection.php";
  include "ujOraTipusSQL.php";
  include "ujOraTipusClass.php";
  $uj = new UjOraTipusContr($nev, $leiras);
  $uj->oratipus();
}

 ?>
