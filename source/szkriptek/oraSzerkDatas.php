<?php

if(isset($_POST["id"]) && isset($_POST["leiras"])){
   $id=$_POST["id"];
   $leiras=$_POST["leiras"];
    
   include "connection.php";
   include "oraSzerkSQL.php";
   include "oraSzerkClass.php";

   $ora= new OraSzerkContr($id, $leiras);
   $ora->oraSzerkesztes();

}

 ?>