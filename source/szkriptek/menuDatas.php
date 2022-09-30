<?php
   if (isset($_POST["menu"])){
      $menu=$_POST["menu"];

      include "connection.php";
      include "menuSQL.php";
      include "menuClass.php";
      $menu = new MenuContr($menu);
      $menu->menu();
   }


 ?>
