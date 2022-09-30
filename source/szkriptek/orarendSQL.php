<?php

   class Orarend extends Connection{

      protected function getOrak($heteleje, $hetvege){

         $sql = "SELECT
                      `ora`.id AS oraID,
                      DAYNAME(`ora`.kezdes) as nap,
                      TIME(`ora`.kezdes) as kezdes,
                      TIME(`ora`.veg) as veg,
                      `ora`.foglalasID,
                      `oktato`.veznev,
                      `oktato`.kernev,
                      `oktato`.id AS oktatoID,
                      `oratipus`.nev AS tipusnev
                  FROM
                      `ora`
                  LEFT JOIN `oratipus` ON `ora`.oratipusID = `oratipus`.id
                  LEFT JOIN `oktato` ON (CASE WHEN `ora`.helyettesID IS NULL
                                            THEN `ora`.`oktatoID`
                                            ELSE `ora`.`helyettesID`
                                          END) = `oktato`.`id`
                  WHERE
                      `ora`.aktualis = TRUE AND DATE(`ora`.kezdes) BETWEEN '$heteleje' AND '$hetvege';";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
           $orak=array();
         			 while($ora = $result->fetch_assoc()) {
                   $orak[]=array('oraID' => $ora["oraID"], 'nap' => $ora["nap"], 'kezdes' => $ora["kezdes"],
                   'foglalasID' => $ora["foglalasID"], 'veg' => $ora["veg"], 'nev' => $ora["veznev"].' '.$ora["kernev"], 'oktatoID' => $ora["oktatoID"], 'tipusnev' => $ora["tipusnev"]);
         			 }
               echo json_encode($orak);
   				}
         else {
            echo "Nincs";
         }
      }
   }
 ?>
