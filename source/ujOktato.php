<?php
	session_start();

	if(!isset($_SESSION["oktatoID"]) || (isset($_GET["hiba"]) && $_GET["hiba"]=="nincs")){
		echo '<form action="szkriptek/menuDatas.php" method="POST" id="form"><button type="submit" id="button"><input type="hidden" name="menu" value="menu"></form>
		<script type="text/javascript">
		function autoSubmit(){
			document.getElementById("form").submit();
		}
		window.onload=autoSubmit();
		document.getElementById("button").style.visibility=false;
		</script>';
	}

?>
<!DOCTYPE html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="kezdolap.css">
  <link rel="stylesheet" type="text/css" href="chat.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul class="nav nav-tabs">

		  <li class="nav-item">
			 <a class="nav-link" href="index.php"><img src="kepek/Very-Basic-Home-icon.png"></a>
		  </li>

		  <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Oktatók</a>
			 <div class="dropdown-menu">
					  <?php for($i = 0 ; $i < count($_SESSION['oktatoID']) ; $i++){
							echo '<a class="dropdown-item" href="oktato.php?id='.$_SESSION["oktatoID"][$i].'">'.$_SESSION["oktatoNev"][$i].'</a>';
					  }if(isset($_SESSION["admin"]))echo '<a class="dropdown-item" href="ujOktato.php">Oktató Felvétele</a>';?>
			 </div>
		  </li>
		  <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Óratípusok</a>
			 <div class="dropdown-menu">
					  <?php for($i = 0 ; $i < count($_SESSION['tipusID']) ; $i++){
						  echo '<a class="dropdown-item" href="ora_tipus.php?id='.$_SESSION["tipusID"][$i].'">'.$_SESSION["tipusNev"][$i].'</a>';
					 }if(isset($_SESSION["admin"]))echo '<a class="dropdown-item" href="ujOraTipus.php">Óratípus Felvétele</a>';?>
			 </div>
		  </li>
				  <?php
			  if(isset($_SESSION["admin"])){ ?>
		  <li class="nav-item">
			 <a class="nav-link" href="orarend.php">Órarend</a>
		  </li>

			  <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Oktatók kezelése</a>
			 <div class="dropdown-menu">
					  <?php for($i = 0 ; $i < count($_SESSION['oktatoID']) ; $i++){
							echo '<a class="dropdown-item" href="profil.php?id='.$_SESSION["oktatoID"][$i].'">'.$_SESSION["oktatoNev"][$i].'</a>';
					  } ?>
			 </div>
		  </li>
			 <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Ügyfelek kezelése</a>
			 <div class="dropdown-menu">
				 <?php for($i = 0 ; $i < count($_SESSION['emailek']) ; $i++){
					  echo '<a class="dropdown-item" href="profil.php?email='.$_SESSION["emailek"][$i].'&vez='.$_SESSION["veznevek"][$i].'&ker='.$_SESSION["kernevek"][$i].'">'.$_SESSION["veznevek"][$i].' '.$_SESSION["kernevek"][$i].'</a>';
				 } ?>
			 </div>
		  </li>
			  <li class="nav-item right">
				  <a class="nav-link" href="logout.php">Kijelentkezés</a>
			  </li>
		  <?php
			  }
			 else if (isset($_SESSION["kernev"]))
					  {
			 ?>
	 <li class="nav-item">
		<a class="nav-link" href="berlet.php">Bérlet vásárlás</a>
	 </li>
	 <li class="nav-item">
		<a class="nav-link active" href="urlap.php">Magánórára jelentkezés</a>
	 </li>
	 <li class="nav-item">
		<a class="nav-link" href="orarend.php">Órarend</a>
	 </li>
		 <li class="nav-item right">
			 <a class="nav-link" href="profil.php"><?php echo $_SESSION["kernev"];?></a>
		 </li>
		 <li class="nav-item right">
			 <a class="nav-link" href="logout.php">Kijelentkezés</a>
		 </li>

			 <?php
				}
			  else
			  {
		  ?>
				  <li class="nav-item">
					<a class="nav-link active" href="urlap.php">Magánórára jelentkezés</a>
			 </li>
				  <li class="nav-item">
			 <a class="nav-link" href="orarend.php">Órarend</a>
				  </li>
			  <li class="nav-item right">
				  <a class="nav-link" href="register.php">Regisztráció</a>
			  </li>
			  <li class="nav-item right">
				  <a class="nav-link" href="login.php">Bejelentkezés</a>
			  </li>
		  <?php
			  }
		  ?>
		</ul>
	 </nav>

		<div class="oldal">
			<div class="adatlap">
				<p class="cim">Új oktató felvétele</p>

				<form class="adatok" method="POST" action="szkriptek/ujOktatoDatas.php">
				<table class="urlap_tabla">
					<tr>
					  <td class="urlap_cella"><label for="vnev" class="adat1">Vezetéknév:</label></td>
					  <td class="urlap_cella"><input type="text" id="veznev" name="vnev"></td>
					</tr>
					<tr>
					  <td class="urlap_cella"><label for="knev" class="adat1">Keresztnév:</label></td>
					  <td class="urlap_cella"><input type="text" id="kernev" name="knev"></td>
					</tr>
					<tr>
					  <td class="urlap_cella"><label for="email" class="adat1">E-mail-cím:</label></td>
					  <td class="urlap_cella"><input type="text" id="emailcim" name="email"></td>
					</tr>
					<tr>
						<td class="urlap_cella"><label for="jelszo" class="adat1">Jelszó:</label></td>
					  <td class="urlap_cella"><input type="text" id="jelszo" name="jelszo"></td>
					</tr>
					<tr>
					  <td class="urlap_cella"><label for="tapasztalat" class="adat1">Tapasztalat:</label></td>
					  <td class="urlap_cella"><input type="text" id="tapaszt" name="tapasztalat"></td>
					</tr>
					<tr>
					  <td class="urlap_cella"><label for="leiras" class="adat1">Leírás:</label>
					  <td class="urlap_cella"><textarea id="leirass" style="width:100%;" name="leiras"></textarea></td>
					</tr>
					<tr>
						<td class="urlap_cella"><button class="gomb" type="submit" name="submit">Küldés</button><br></td>
					</tr>
				</table>
				</form>
			</div>
		</div>

</body>
