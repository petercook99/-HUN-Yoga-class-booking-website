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

	  if(isset($_GET["email"]) && isset($_GET["ker"])){
	     $_SESSION["ugyfel"]=true;
	     $_SESSION["oktato"]=false;
	     $_SESSION["veznev"]=$_GET["vez"];
		  $_SESSION["kernev"]=$_GET["ker"];
	     $_SESSION["email"]=$_GET["email"];
	 }
	 elseif(isset($_GET["id"])){
	     $_SESSION["ugyfel"]=false;
	     $_SESSION["oktato"]=true;
	     $_SESSION["id"]=$_GET["id"];
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

<body onload="loadDatas()">

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
			 <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Oktatók kezelése</a>
			 <div class="dropdown-menu">
					  <?php for($i = 0 ; $i < count($_SESSION['oktatoID']) ; $i++){
							echo '<a class="dropdown-item" href="profil.php?id='.$_SESSION["oktatoID"][$i].'">'.$_SESSION["oktatoNev"][$i].'</a>';
					  } ?>
			 </div>
		  </li>
			 <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Ügyfelek kezelése</a>
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
				 else if (isset($_SESSION["oktato"]))
						  {
				 ?>
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
				 else if (isset($_SESSION["ugyfel"]))
						  {
				 ?>
		 <li class="nav-item">
			<a class="nav-link" href="berlet.php">Bérlet vásárlás</a>
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
			<div class="adatlap">
				<div class="adatok">
					<p class="adat1">Név:</p>
					<p class="adat2" id="nev"></p>
				</div>
				<div class="adatok">
					<p class="adat1">E-mail-cím:</p>
					<p class="adat2" id="email"></p>
				</div>
				<?php if(isset($_SESSION["telefon"]))
				{
				 ?>
				<div class="adatok">
					<p class="adat1">Telefonszám: <input type="text" id="tel_sz" value=<?php echo $_SESSION["telefon"]; ?> readonly="readonly">
					<input type="image" src="kepek/edit-icon.png" class="szerkeszto_ikon" name='edit' value='edit'>
					<input type="image" src="kepek/Save-icon.png" class="szerkeszto_ikon" name='save' value='save'></p><br>
				</div>
				<?php
				}
				?>
				<div class="adatok" id="tablak">
					<p class="adat1" id="berlet">Bérletek</p><br>
					<table id="berlettabla">
						<th>Oktató</th><th>Típus</th><th>Még hátra lévő órák</th>
						<tr>
							<td>Horváth Andrea</td><td>1</td><td>2</td>
						</tr>
					</table><br>

					<p class="adat1" id="foglalas">Foglalások</p><br>
					<table id="foglalastabla">
						<th>Oktató</th><th>Dátum</th><th>Lemondás</th>
						<tr>
							<td>Horváth Andrea</td><td>2021.12.20. 18:00</td><td onclick="lemondas(6, `2021.12.20. 18:00`)"><img src="kepek/trash-empty-icon.png"></td>
						</tr>
					</table><br>

				</div>
			</div>
		</div>
		<script type="text/javascript">
			function loadDatas() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				 if (this.readyState == 4 && this.status == 200) {
					 <?php if(isset($_SESSION["ugyfel"]) && $_SESSION["ugyfel"])
					 {
					 ?>
					 //ugyfelprofil
					document.getElementById("nev").innerHTML='<?php echo $_SESSION["veznev"] ?> <?php echo $_SESSION["kernev"]; ?>';
					document.getElementById("email").innerHTML='<?php  echo $_SESSION["email"]; ?>';
					if(this.responseText.split("%%")[0]=="nincs") document.getElementById("berlettabla").innerHTML = "Önnek jelenleg nincs bérlete.";
					else document.getElementById("berlettabla").innerHTML = this.responseText.split("%%")[0];
					if(this.responseText.split("%%")[1]=="nincs") document.getElementById("foglalastabla").innerHTML = "Önnek jelenleg nincs foglalása.";
					else document.getElementById("foglalastabla").innerHTML = this.responseText.split("%%")[1];

					<?php
					}
					else if(isset($_SESSION["oktato"]) && $_SESSION["oktato"])
					{
					?>
					//oktatoProfil
					console.log(this.responseText.split('%%')[2]);
					let berletszoveg='';
					let foglalasszoveg='';
					let orakszoveg='';
					if(this.responseText.split('%%')[0]=="nincs") berletszoveg='<tr><td>Önhöz senki se vett még bérletet.</td><tr>';
					else berletszoveg=this.responseText.split('%%')[0];
					if(this.responseText.split('%%')[1]=="nincs") foglalasszoveg='<tr><td>Az Ön óráira nem érkeztek még foglalások.</td><tr>';
					else foglalasszoveg=this.responseText.split('%%')[1];
					if(this.responseText.split('%%')[2]=="nincs") orakszoveg='<tr><td>Önnek jelenleg nincs megtartandó órája.</td><tr>';
					else orakszoveg=this.responseText.split('%%')[2];
					let html=`
					<p class="adat1" id="berlet">Hozzám szóló bérletek</p><br>
					<table id="berlettabla">
					`+berletszoveg+`
					</table><br>
					<p class="adat1" id="foglalas">Hozzám szóló foglalások</p><br>
					<table id="foglalastabla">
					`+foglalasszoveg+`
					</table><br>

					<p class="adat1" id="foglalas">Óráim</p><br>
					<table id="oraktabla">
					`+orakszoveg+`
					</table><br>
					`;
					document.getElementById("tablak").innerHTML=html;
					document.getElementById("email").innerHTML=this.responseText.split('%%')[3];
					document.getElementById("nev").innerHTML=this.responseText.split('%%')[4];
					<?php
				 	}
				 	?>
				 }
				};
				<?php if(isset($_SESSION["ugyfel"]) && $_SESSION["ugyfel"])
				{
				?>
					let postDatas="email=<?php echo $_SESSION["email"];?>&profil=1";
				<?php
				}
				else if(isset($_SESSION["oktato"]) && $_SESSION["oktato"])
				{
				?>
					let postDatas="id=<?php echo $_SESSION["id"];?>";
				<?php
				}
				?>
				xhttp.open("POST", "szkriptek/profilDatas.php", true);
				xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhttp.send(postDatas);
			}

			function lemondas(id, startDate, berlet, oktatoID, ugyfelEmail) {
				today = new Date();
				//check if it's 6 hours before the start of the lesson, else it's not allowed
				startMinus6 = new Date(startDate);
				startMinus6.setHours(startMinus6.getHours()-6);
				if (today>startMinus6) alert("Ezt az órát már nem tudja lemondani. Lejelentkezni csak a kezdés előtt legalább 6 órával lehet.");
				else{
					result = window.confirm("Biztosan le szeretné mondani a foglalást?");
					if(result){
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
							if(this.responseText.split('%%')[0]=="OK" && this.responseText.split('%%')[1]=="OK")  alert("Az óra lemondása sikeres. Bérlet frissítve.");
							else if(this.responseText.split('%%')[0]=="OK" && this.responseText.split('%%')[1]=="") alert("Az óra lemondása sikeres.");
							else alert("Hiba történt. Próbálja újra!");
							loadDatas();
						 }
						};
						xhttp.open("POST", "szkriptek/lemondasDatas.php", true);
						xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhttp.send("id="+id+"&email="+ugyfelEmail+"&berlet="+berlet+"&oktatoID="+oktatoID);
					}

				}

			}
	   </script>

	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	   <script>
	   		 $(document).ready(function(){

		 $("form input[type=text]").prop("readonly",true);

         $("input[name=edit]").on("click",function(){

                 $("input[type=text]").removeAttr("readonly");
         })


		 $("input[name=save]").on("click",function(){

         $("input[type=text]").prop("readonly",true);
         })

		})
	   </script>
</body>
