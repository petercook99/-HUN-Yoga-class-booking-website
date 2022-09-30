<?php

if(isset($_POST["id"])){

   $id=$_POST["id"];

   include "connection.php";
   include "ora_tipusSQL.php";
   include "ora_tipusClass.php";
   $oratipus = new TipusContr($id);
   $oratipus->oratipus();
}


 ?>
