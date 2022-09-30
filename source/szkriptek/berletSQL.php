<?php

   class Berlet extends Connection{

      protected function setBerlet($email, $oktato, $alkalmak){
         $sql = "INSERT INTO berletek VALUES('$email', $oktato, $alkalmak, $alkalmak, CURRENT_TIMESTAMP());";
         if ($this->connect()->query($sql) === TRUE) {
            header("location: ../berlet.php?hiba=nincs");
         }
         else {
            header("location: ../berlet.php?hiba=adatbazis");
            exit();
         }
      }

      protected function berletExists($email, $oktato){
         $sql = "SELECT * FROM berletek WHERE email = '$email' AND oktatoID = '$oktato';";
         $result = mysqli_query($this->connect(), $sql);
         if ($row = mysqli_fetch_assoc($result)) return true;
         else return false;
      }
   }
 ?>
