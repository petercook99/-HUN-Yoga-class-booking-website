<?php

   class Oktato extends Connection{

      protected function getOktatok($id){
         if($id>0){ //oktatói oldalhoz
            $sql = "SELECT id, email, veznev, kernev, tapasztalat, leiras FROM oktato WHERE id='$id';";
            $result = mysqli_query($this->connect(), $sql);
            if ($result->num_rows > 0) {
               
   				while($oktato = $result->fetch_assoc()) {
                  $oktatok=array('id' => $oktato["id"], 'email' => $oktato["email"], 'nev' => $oktato["veznev"].' '.$oktato["kernev"],
                   'tapasztalat' => $oktato["tapasztalat"], 'leiras' => $oktato["leiras"]);
               }
               echo json_encode($oktatok);
            }
            else {
               echo "nincs";
            }
         }
         else { //bérlethez és űrlaphoz
            $sql = "SELECT id, veznev, kernev FROM oktato;";
            $result = mysqli_query($this->connect(), $sql);
            if ($result->num_rows > 0) {
               $oktatok=array();
   				while($oktato = $result->fetch_assoc()) {
                  $oktatok[]=array('id' => $oktato["id"], 'nev' => $oktato["veznev"].' '.$oktato["kernev"]);
               }
               echo json_encode($oktatok);
            }
            else {
               echo "nincs";
            }
         }
      }
   }
 ?>
