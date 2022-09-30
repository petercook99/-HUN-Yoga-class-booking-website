<?php

if(isset($_POST["foglID"])){
   $foglID=$_POST["foglID"];

   include "connection.php";
   include "orarendDeleteSQL.php";
   include "orarendDeleteClass.php";

 $orarendDel = new OrarendDelContr($foglID);
 $orarendDel->orarendDel();

}

 ?>
