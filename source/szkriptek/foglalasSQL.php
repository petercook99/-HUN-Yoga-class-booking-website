<?php

   class Foglalas extends Connection{

      protected function setFoglalas($email, $foglalasID, $mod){
         $berlet=0;
         if($mod=="berlet") $berlet=1;
         $sql = "INSERT INTO `foglalasok` VALUES ($foglalasID, '$email', CURRENT_TIMESTAMP(), $berlet);";
         if ($this->connect()->query($sql) === TRUE) {
            return true;
         }
         else {
            return false;
         }
      }

      protected function berletLevonas($email, $oktatoID, $alkalmak){
         $sql = "";
         if($alkalmak > 1) $sql = "UPDATE `berletek` SET alkalmak=alkalmak-1 WHERE email='$email' AND oktatoID='$oktatoID';";
         else $sql = "DELETE FROM `berletek` WHERE email='$email' AND oktatoID='$oktatoID'";
         if ($this->connect()->query($sql) === TRUE) {
            return true;
         }
         else {
            return false;
         }
      }
   }
 ?>
