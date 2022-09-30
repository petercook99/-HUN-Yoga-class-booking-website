<?php

   class oktatoSzerk extends Connection{

      protected function oktatoSzerkeszt($id, $tapasztalat, $leiras){
         $sql = "UPDATE `oktato` SET leiras='$leiras', tapasztalat='$tapasztalat' WHERE id='$id';";
         if ($this->connect()->query($sql) === TRUE) {
            echo "OK";
         }
         else {
            echo "error";
         }
      }
   }
 ?>
