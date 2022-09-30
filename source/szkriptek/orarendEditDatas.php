<?php

if(isset($_POST["korlat"])){
  $kezdes=$_POST["kezdes"];
  $veg=$_POST["veg"];
  $oktato=$_POST["oktato"];
  $ora=$_POST["oratipus"];
  $korlat=$_POST["korlat"];

  include "connection.php";
  include "orarendEditSQL.php";
  include "orarendEditClass.php";

  $newClass = new OrarendNewContr($kezdes, $veg, $oktato, $ora, $korlat);
  $newClass->orarendNewClass();
}
else if(isset($_POST["submit"])){
  $foglalasID=$_POST["foglalasID"];
  $kezdes=$_POST["kezdes"];
  $veg=$_POST["veg"];
  $helyettes=$_POST["helyettes"];
  if($helyettes == "")
  {
    $helyettes = NULL;
  }

  include "connection.php";
  include "orarendEditSQL.php";
  include "orarendEditClass.php";

  $edit = new OrarendEditContr($foglalasID, $kezdes, $veg, $helyettes);
  $edit->orarendEdit();
}



 ?>
