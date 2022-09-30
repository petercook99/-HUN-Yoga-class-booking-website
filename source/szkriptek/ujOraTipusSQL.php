<?php

   class UjOraTipus extends Connection{

      protected function setOratipus($nev, $leiras){
         $sql = "INSERT INTO oratipus VALUES(null, '$nev', '$leiras');";
         if ($this->connect()->query($sql) === TRUE) {
            header("location: ../ujOraTipus.php?hiba=nincs");
            exit();
         }
         else {
            header("location: ../ujOraTipus.php?hiba=adatbazis");
            exit();
         }
      }
   }
 ?>
