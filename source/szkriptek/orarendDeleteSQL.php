<?php

   class OrarendDel extends Connection{

   protected function orarendDelete($foglID){

        $sql = "UPDATE `ora` SET `aktualis` = 0 WHERE `foglalasID` = $foglID;";
        if ($this->connect()->query($sql) === TRUE) {
           echo "OK";
        }
        else {
           echo "error";
        }
      }
   }
 ?>
