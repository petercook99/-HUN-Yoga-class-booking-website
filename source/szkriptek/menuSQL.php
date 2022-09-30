<?php

    class Menu extends Connection{

       protected function getOktatok(){
          $sql = "SELECT id, veznev, kernev FROM oktato;";
           $result = mysqli_query($this->connect(), $sql);
          session_start();
          $_SESSION["oktatoID"]=array();
          $_SESSION["oktatoNev"]=array();
            while($row = $result->fetch_assoc()) {
             array_push($_SESSION["oktatoID"], $row["id"]);
             array_push($_SESSION["oktatoNev"], $row["veznev"].' '.$row["kernev"]);
           }
       }
       protected function getTipusok(){
          $sql = "SELECT id, nev FROM oratipus;";
          $result = mysqli_query($this->connect(), $sql);
          $_SESSION["tipusID"]=array();
          $_SESSION["tipusNev"]=array();
            while($row = $result->fetch_assoc()) {
             array_push($_SESSION["tipusID"], $row["id"]);
             array_push($_SESSION["tipusNev"], $row["nev"]);
          }
       }

        protected function getUgyfelek(){
          $sql = "SELECT email, veznev, kernev FROM felhasznalok;";
           $result = mysqli_query($this->connect(), $sql);
          session_start();
          $_SESSION["emailek"]=array();
          $_SESSION["veznevek"]=array();
          $_SESSION["kernevek"]=array();
         while($row = $result->fetch_assoc()) {
          array_push($_SESSION["emailek"], $row["email"]);
          array_push($_SESSION["veznevek"], $row["veznev"]);
          array_push($_SESSION["kernevek"], $row["kernev"]);
        }
       }
    }
  ?>
