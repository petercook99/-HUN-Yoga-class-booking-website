<?php

   class Register extends Connection{
      protected function setUser($email, $pw, $lname, $fname, $phone){
         $sql = "INSERT INTO `felhasznalok` VALUES ('$email', '$pw', '$lname', '$fname', '$phone');";
         if ($this->connect()->query($sql) === TRUE) {
            header("location: ../index.php?hiba=nincs");
         }
         else {
            header("location: ../index.php?hiba=adatbazis");
            exit();
         }
      }

      protected function emailExists($email){
         $sql="SELECT email FROM `felhasznalok` WHERE email = '$email';";
         $result = mysqli_query($this->connect(), $sql);
         $userEmailFound=false;
         if ($row = mysqli_fetch_assoc($result)) return true;
         else{
            $sql="SELECT email FROM `oktato` WHERE email = '$email';";
            $result = mysqli_query($this->connect(), $sql);
            if ($row = mysqli_fetch_assoc($result)) return true;
            else return false;
         }
      }
   }
 ?>
