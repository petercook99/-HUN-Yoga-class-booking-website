<?php

   class Login extends Connection{

      protected function getUser($email, $pw){
         $sql = "SELECT * FROM `felhasznalok` WHERE email='$email';";
         $result = mysqli_query($this->connect(), $sql);
         if ($user = mysqli_fetch_assoc($result)) {
            if ($pw===$user["jelszo"]){
               session_start();
               $_SESSION["ugyfel"] = true;
               $_SESSION["email"] = $user["email"];
               $_SESSION["veznev"] = $user["veznev"];
               $_SESSION["kernev"] = $user["kernev"];
               $_SESSION["telefon"] = $user["telefon"];
               header("location: ../index.php?hiba=nincs");
               exit();
            }
            else {
               header("location: ../index.php?hiba=rosszjelszo");
               exit();
            }
         }
         else {
            return false;
         }
      }

      protected function getOktato($email, $pw){
         $sql = "SELECT * FROM `oktato` WHERE email='$email';";
         $result = mysqli_query($this->connect(), $sql);
         if ($oktato = mysqli_fetch_assoc($result)) {
            if ($pw===$oktato["jelszo"]){
               session_start();
               $_SESSION["oktato"] = true;
               $_SESSION["id"] = $oktato["id"];
               $_SESSION["email"] = $oktato["email"];
               $_SESSION["veznev"] = $oktato["veznev"];
               $_SESSION["kernev"] = $oktato["kernev"];
            }
            else {
               header("location: ../index.php?hiba=rosszjelszo");
               exit();
            }
         }
         else {
            header("location: ../index.php?hiba=nincsilyenemail");
            exit();
         }
      }


   }
 ?>
