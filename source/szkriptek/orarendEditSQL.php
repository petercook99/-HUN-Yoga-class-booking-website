<?php

   class OrarendEdit extends Connection{

      protected function setEdit($foglalasID, $kezdes, $veg, $helyettes){

        $sql_datum = "SELECT DATE(`kezdes`) as kezdes_datum, DATE(`veg`) as veg_datum FROM `ora` WHERE `foglalasID` = $foglalasID;";
        $result = mysqli_query($this->connect(), $sql_datum);
        $row = $result->fetch_assoc();

        $kezdes_datum = $row["kezdes_datum"];
        $veg_datum = $row["veg_datum"];
        $kezdes_ido = $kezdes;
        $veg_ido = $veg;

        $kezdes_datum_ido_str = $kezdes_datum . ' ' . $kezdes_ido;
        $veg_datum_ido_str = $veg_datum . ' ' . $veg_ido;

        $kezdes_datum_ido = date('Y-m-d H:i:s', strtotime($kezdes_datum_ido_str));
        $veg_datum_ido = date('Y-m-d H:i:s', strtotime($veg_datum_ido_str));

        if(is_null($helyettes))
        {
          $sql = "UPDATE `ora` SET `kezdes` = '$kezdes_datum_ido', `veg` = '$veg_datum_ido' WHERE `foglalasID` = $foglalasID;";
        }
        else {
          $sql = "UPDATE `ora` SET `kezdes` = '$kezdes_datum_ido', `veg` = '$veg_datum_ido', `helyettesID` = $helyettes WHERE `foglalasID` = $foglalasID;";
        }

         if ($this->connect()->query($sql) === TRUE) {
            header("location: ../orarend.php");
            exit();
         }
         else {
            echo '<script>alert("Hiba")</script>';
            exit();
         }
      }
   }

   class OrarendNewClass extends Connection{
     protected function setNewClass($kezdes, $veg, $oktato, $ora, $korlat){
       $sql_max = "SELECT MAX(id) as max_id FROM `ora`";
       $result_max = mysqli_query($this->connect(), $sql_max);
       $row = $result_max->fetch_assoc();
       $max = $row["max_id"]+1;

         $sql = "INSERT INTO `ora` (`id`, `verzio`, `aktualis`, `kezdes`, `veg`, `oratipusID`, `oktatoID`, `korlat`) VALUES ($max, 1, 1, '$kezdes', '$veg', $ora, $oktato, $korlat);";
         if($this->connect()->query($sql) === TRUE)
         {
           header("location: ../orarend.php");
           exit();
         }
         else {
           echo '<script>alert("Hiba")</script>';
           exit();
         };
       }
     }
 ?>
