<?php

   class UjOktato extends Connection{

      protected function setOktato($vnev, $knev, $email, $jelszo, $tapasztalat, $leiras){
         $sql = "INSERT INTO oktato VALUES(null, '$email', '$jelszo', '$vnev', '$knev', $tapasztalat, '$leiras');";
         if ($this->connect()->query($sql) === TRUE) {
            header("location: ../ujOktato.php?hiba=nincs");
            exit();
         }
         else {
            header("location: ../ujOktato.php?hiba=adatbazis");
            exit();
         }
      }
   }
 ?>
