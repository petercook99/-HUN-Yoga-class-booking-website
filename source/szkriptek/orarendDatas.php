<?php

if(isset($_POST["heteleje"]) && isset($_POST["hetvege"])){
    $heteleje=$_POST["heteleje"];
    $hetvege=$_POST["hetvege"];

    include "connection.php";
    include "orarendSQL.php";
    include "orarendClass.php";

    $orarend = new orarendContr($heteleje, $hetvege);
    $orarend->orarend();
}
 ?>
