<?php

   class Lemondas extends Connection{

      protected function torles($id, $email){
         $sql = "DELETE FROM `foglalasok` WHERE id='$id' AND email='$email';";
         if ($this->connect()->query($sql) === TRUE) {
            echo "OK%%";
         }
         else {
            echo "error%%";
         }
      }

      protected function berletFrissites($email, $oktatoID){
         $sql = "UPDATE `berletek` SET alkalmak=alkalmak+1 WHERE email='$email' AND oktatoID='$oktatoID';";
         if ($this->connect()->query($sql) === TRUE) {
            echo "OK";
         }
         else {
            echo "error";
         }
      }
   }
 ?>
