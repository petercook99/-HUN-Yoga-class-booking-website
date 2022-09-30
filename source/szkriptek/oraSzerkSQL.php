<?php

   class oraSzerk extends Connection{

      protected function oraSzerkeszt($id, $leiras){
         $sql = "UPDATE `oratipus` SET leiras='$leiras' WHERE id='$id';";
         if ($this->connect()->query($sql) === TRUE) {
            echo "OK";
         }
         else {
            echo "error";
         }
      }
   }
 ?>
