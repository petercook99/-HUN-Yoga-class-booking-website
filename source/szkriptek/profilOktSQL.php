<?php

   class ProfilOkt extends Connection{

      protected function getBerlet($id){
         $sql = "SELECT `felhasznalok`.email, `felhasznalok`.veznev, `felhasznalok`.kernev, tipus, alkalmak FROM `berletek`
         JOIN `felhasznalok` on `berletek`.email=`felhasznalok`.email WHERE `berletek`.oktatoID='$id';";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
           $response='<th>Email</th><th>Név</th><th>Típus</th><th>Még hátra lévő órák</th>';
      			while($berlet = $result->fetch_assoc()) {
      					$response.=
                     '<tr><td>' .$berlet["email"].
      				   '</td><td>' . $berlet["veznev"].' '.$berlet["kernev"].
      					'</td><td>' . $berlet["tipus"]. ' alkalmas'.
      					'</td><td>' . $berlet["alkalmak"].
      					'</td></tr>' ;
      			}
           $response.='%%';
           echo $response;

			}
         else {
            echo "nincs%%";
         }
      }

      protected function getFoglalas($id){
         $sql = "SELECT `felhasznalok`.email, `felhasznalok`.veznev, `felhasznalok`.kernev,
         `ora`.kezdes, `ora`.foglalasID, `ora`.id as oraid, `foglalasok`.berlet, `foglalasok`.id FROM `ora`
         join `foglalasok` on `foglalasok`.id=`ora`.foglalasID JOIN `felhasznalok` on `felhasznalok`.email=`foglalasok`.email
         WHERE `ora`.oktatoID='$id' AND `ora`.veg > CURRENT_TIMESTAMP() ORDER BY `ora`.kezdes;";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
            $response='<th>Email</th><th>Név</th><th>Kezdés</th><th>Lemondás</th>';
      				while($foglalas = $result->fetch_assoc()) {
      					$response.=
                     '<tr><td>' . $foglalas["email"].
      					'</td><td>' . $foglalas["veznev"].' '.$foglalas["kernev"].
      					'</td><td>' . $foglalas["kezdes"].
                     '</td><td onclick="lemondas('. $foglalas["foglalasID"] .', `'. $foglalas["kezdes"] .'`, '. $foglalas["berlet"] .', '. $foglalas["id"] .', `'. $foglalas["email"] .'`)">
                     <img src="kepek/trash-empty-icon.png">
                     </td></tr>' ;
      				}
            $response.='%%';
            echo $response;
			}
         else {
            echo "nincs%%";
         }
      }

      protected function getOrak($id){
         $sql = "SELECT `ora`.id as oraid, `ora`.kezdes, `ora`.veg, `ora`.foglalasID, `ora`.helyettesID,
          `okt`.veznev, `okt`.kernev, `okt`.email, `oratipus`.nev, `helyettes`.veznev as helyettvez, `helyettes`.kernev as helyettker FROM `ora`
         LEFT JOIN `oktato` okt on `okt`.id=`ora`.oktatoID LEFT JOIN `oktato` helyettes on `helyettes`.id=`ora`.helyettesID
         LEFT JOIN `foglalasok` on `foglalasok`.id=`ora`.foglalasID LEFT JOIN oratipus ON `oratipus`.id=`ora`.oratipusID
         WHERE (`ora`.oktatoID='$id' OR `ora`.helyettesID='$id') AND `ora`.veg > CURRENT_TIMESTAMP() ORDER BY `ora`.kezdes;";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
            $response='<th>Kezdés</th><th>Vége</th><th>Típus</th><th>Helyettesítés</th><th>Módosítás</th>';
      				while($ora = $result->fetch_assoc()) {
                     if(is_null($ora["helyettesID"])) $ora["helyettesID"]='nincs';
                     else $ora["helyettesID"]= $ora["helyettvez"].' '.$ora["helyettker"];
      					$response.= '
      					<tr><td>' . $ora["kezdes"].
      					'</td><td>' . $ora["veg"].
                     '</td><td>' . $ora["nev"].
                     '</td><td>' . $ora["helyettesID"].
                     '</td><td onclick="modosit('. $ora["foglalasID"] .', `'. $ora["kezdes"] .'`,  '. $ora["oraid"] .')">
                     <img src="kepek/trash-empty-icon.png">
                     </td></tr>' ;
      				}
                  $response.='%%';
            echo $response;
			}
         else {
            echo 'nincs%%';
         }
      }

      protected function getOkt($id){
         $sql = "SELECT email, veznev, kernev FROM `oktato` WHERE id='$id';";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
				if($oktato = $result->fetch_assoc()) {
               $response=$oktato["email"].'%%'.$oktato["veznev"].' '.$oktato["kernev"];
            }
            echo $response;
			}
      }
   }
 ?>
