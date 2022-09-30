<?php

   class Profil extends Connection{

      protected function getBerlet($email, $profil){
         $sql = "SELECT tipus, alkalmak, `oktato`.veznev, `oktato`.kernev, `oktato`.id FROM `berletek`
         JOIN `oktato` on `berletek`.oktatoID=`oktato`.id WHERE `berletek`.email='$email';";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
            if($profil=="1"){ //profil kérte
              $response='<th>Oktató</th><th>Típus</th><th>Még hátra lévő órák</th>';
         			while($berlet = $result->fetch_assoc()) {
         					$response.= '
         					<tr><td>' . $berlet["veznev"].' '.$berlet["kernev"].
         					'</td><td>' . $berlet["tipus"]. ' alkalmas'.
         					'</td><td>' . $berlet["alkalmak"].
         					'</td></tr>' ;
         			}
              $response.='%%';
              echo $response;
            }
            else {  //foglalás.php kérte
               $berletek=array();
   				while($berlet = $result->fetch_assoc()) {
               $berletek[]=array('oktatoid' => $berlet["id"], 'tipus' => $berlet["tipus"], 'alkalmak' => $berlet["alkalmak"]);
                  //$response.=$berlet["id"].','.$berlet["tipus"].','.$berlet["alkalmak"].';';
                  //echo $berletek["id"];
                  //echo $berlet["alkalmak"]
   				}
               //$response=substr($response,0,-1);
               //echo $response;
               echo json_encode($berletek);
               echo "%%";
            }
			}
         else {
            echo "nincs%%";
         }
      }

      protected function getFoglalas($email, $profil){
         $sql = "SELECT `oktato`.id, `oktato`.veznev, `oktato`.kernev, `ora`.kezdes, `ora`.foglalasID, `ora`.id as oraid, `foglalasok`.berlet FROM `ora`
         JOIN `oktato` on `oktato`.id=`ora`.oktatoID join `foglalasok` on `foglalasok`.id=`ora`.foglalasID
         WHERE `foglalasok`.email='$email' AND `ora`.veg > CURRENT_TIMESTAMP() ORDER BY `ora`.kezdes;";
         $result = mysqli_query($this->connect(), $sql);
         if ($result->num_rows > 0) {
            if($profil){
               $response='<th>Oktató</th><th>Dátum</th><th>Lemondás</th>';
         				while($foglalas = $result->fetch_assoc()) {
         					$response.= '
         					<tr><td>' . $foglalas["veznev"].' '.$foglalas["kernev"].
         					'</td><td>' . $foglalas["kezdes"].
                        '</td><td onclick="lemondas('. $foglalas["foglalasID"] .', `'. $foglalas["kezdes"] .'`, '. $foglalas["berlet"] .', '. $foglalas["id"] .',`'. $email .'`)">
                        <img src="kepek/trash-empty-icon.png">
                        </td></tr>' ;
         				}
               echo $response;
            }
            else { //foglalas.php kérte
               $response='';
         				while($foglalas = $result->fetch_assoc()) {
                        $response.=$foglalas["oraid"].';';
         				}
               $response=substr($response, 0, -1);
               echo $response;
            }
			}
         else {
            echo "nincs";
         }
      }
   }
 ?>
