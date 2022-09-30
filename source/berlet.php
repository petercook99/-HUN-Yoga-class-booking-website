<?php
	session_start();

	if(!isset($_SESSION["oktatoID"])){
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body onload="oktatok()">

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
			 <a class="nav-link active" href="berlet.php">Bérlet vásárlás</a>
		  </li>
		  <li class="nav-item">
			 <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeVI8NCe8HrNp6_XH8PEPIRQKtcRRf_skiasJYFAiSa_CuJZQ/viewform">Magánórára jelentkezés</a>
		  </li>
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
		<a class="nav-link active" href="berlet.php">Bérlet vásárlás</a>
	 </li>
	 <li class="nav-item">
		<a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeVI8NCe8HrNp6_XH8PEPIRQKtcRRf_skiasJYFAiSa_CuJZQ/viewform">Magánórára jelentkezés</a>
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
					<a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeVI8NCe8HrNp6_XH8PEPIRQKtcRRf_skiasJYFAiSa_CuJZQ/viewform">Magánórára jelentkezés</a>
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
<!--			<img src="oktato.jpg" class="hatterkep"> -->
			<div class="adatlap">
				<p class="cim">Bérlet vásárlás</p>

				<form class="adatok" action="szkriptek/berletDatas.php" method="POST">
						<input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">
					  <label for="oktato" class="adat1">Kérem válasszon oktatót:</label>
					  <select id="oktato" name="oktato" onchange="">
						<option value="Oktató 1">Oktató 1</option>
						<option value="Oktató 2">Oktató 2</option>
						<option value="Oktató 3">Oktató 3</option>
						<option value="Oktató 4">Oktató 4</option>
					  </select> <br><br>
					  <label for="alkalmak" class="adat1">Kérem válasszon milyen típusú bérletet szeretne:</label>
					  <select id="alkalmak" name="alkalmak">
						<option value="5">5 alkalmas</option>
						<option value="10">10 alkalmas</option>
					  </select><br><br>
					<div class="kozepre"><button class="tovabb_gomb" type="submit" name="submit">Tovább</div>
				</form>
			</div>
		</div>

		<script type="text/javascript">
			function oktatok() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				 if (this.readyState == 4 && this.status == 200) {
					let nincsOktato=false;
					if(this.responseText=="nincs") nincsOktato=true;
					else {
						const oktatok=JSON.parse(this.responseText);
						let options='';
						for (var i = 0; i < oktatok.length; i++) {
							options+='<option value="'+oktatok[i].id+'">'+oktatok[i].nev+'</option>'
						}
						document.getElementById("oktato").innerHTML=options;
					}
				 }
				};
				xhttp.open("POST", "szkriptek/oktatoDatas.php", true);
				xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhttp.send("id=0");
			}
		</script>
</body>
