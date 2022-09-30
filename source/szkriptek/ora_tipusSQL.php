<?php

   class Tipus extends Connection{

      protected function getTipus($id){
        if($id>0){
          $sql = "SELECT id, nev, leiras FROM oratipus WHERE id='$id';";
          $result = mysqli_query($this->connect(), $sql);
          if ($result->num_rows > 0) {

 				while($oratipus = $result->fetch_assoc()) {
                $tipus=array('id' => $oratipus["id"], 'nev' => $oratipus["nev"], 'leiras' => $oratipus["leiras"]);
             }
             echo json_encode($tipus);
          }
          else {
             echo "nincs";
          }
        }
        else {
           $sql = "SELECT id, nev FROM oratipus;";
           $result = mysqli_query($this->connect(), $sql);
           if ($result->num_rows > 0) {
              $oratipusok=array();
         while($oratipusok = $result->fetch_assoc()) {
                 $tipusok[]=array('id' => $oratipusok["id"], 'tipusnev' => $oratipusok["nev"]);
              }
              echo json_encode($tipusok);
           }
           else {
              echo "nincs";
           }
        }
      }
   }
 ?>
