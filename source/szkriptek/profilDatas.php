<?php

if(isset($_POST["email"]) && isset($_POST["profil"])){

   $email=$_POST["email"];
   $profil=$_POST["profil"];
   //a profil vagy az órarend(foglalás) küldte a kérést. Ettől függ a válaszüzenet felépítése.

   include "connection.php";
   include "profilSQL.php";
   include "profilClass.php";

   $profil = new ProfilContr($email, $profil);
   $profil->profil();

}

else if(isset($_POST["id"])){

   $id=$_POST["id"];

   include "connection.php";
   include "profilOktSQL.php";
   include "profilOktClass.php";

   $profil = new ProfilOktContr($id);
   $profil->profilOkt();
}

 ?>
