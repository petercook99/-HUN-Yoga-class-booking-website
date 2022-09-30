<?php
mb_internal_encoding("utf-8");
class Connection{

   protected function connect(){
      try {

         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "projlab";

         $con = new mysqli($servername, $username, $password, $dbname);

         mysqli_set_charset($con,"utf8");
         return $con;
      } catch (\Exception $e) {
         die("Connection failed: " . $con->connect_error);
      }

   }

}
 ?>
