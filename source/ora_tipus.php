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
  <link rel="stylesheet" type="text/css" href="chat.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body onload="oratipusBetoltes()">

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
			 <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Óratípusok</a>
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
				<p class="cim" id="nev">Gerincjóga</p>

				<div class="adatok">

				<label class="adat1">Leírás:
				<?php
					if (isset($_SESSION["oktato"]) || isset($_SESSION["admin"]))
					{
					?>
					<input type="image" src="kepek/edit-icon.png" class="szerkeszto_ikon" name='edit' value='edit'>
					<input type="image" src="kepek/Save-icon.png" class="szerkeszto_ikon" name='save' value='save' onclick="tipusSzerkesztes()">
					<?php
					} ?>
					</label><br>

					<textarea id="leiras" readonly="readonly">A gerincjóga a jóga és a csoportos mozgásterápiák ötvözete, amely könnyen befogadható és elsajátítható a modern európai ember számára. Biztonságos, stabil, izolált gyakorlatsorral a teljes testet átmozgatjuk, majd óra végén relaxációban lazítunk. A gyakorlás során a jóga eszköztárát alkalmazva hangsúlyozottan foglalkozunk a gerinccel, a helyes tartás és helyes légzés tudatosításával, a cél a harmonikus test és lélek egységének megteremtése. Bárki számára könnyen kivitelezhető, örömteli fejlődést tesz lehetővé.

A hatha jóga testtartásaiból kiinduló gerincjóga olyan modern mozgásterápia, melynek célja a fizikai test és az idegrendszer egészségének helyreállítása biztonságos, az anatómiai alapmozgásokra épülő alap gyakorlatsorokkal. A gerincjóga a teljes fizikumot kezeli módszeresen, hatékonyan támogatja és kiegészíti a személyre szabott, célirányos gyógyító eljárásokat.

A jóga ászanák anatómiai és energetikai szempontból is „tökéletes“ testtartások: helyes gyakorlásuk kiegyensúlyozza az izomrendszert és az elmét, valamint támogatják a szervezet saját gyógyító folyamatait, így harmonizálják a hormonális háztartást, a keringést és az energetikai folyamatokat is.

A rendszeres gyakorlással érezni fogod a változásokat nem csupán a testben, de a közérzetben, a tudatosságban is. Türelmesebbé és figyelmesebbé válik az ember, a munka könnyebben és hatékonyabban fog menni, kevesebb ételre és alvásra lesz szükség. Boldogabb, teljesebb életérzést élhetünk meg.

                        Az óra felépítése:

                            1. Ráhangolódás

                            2. Légzőgyakorlatok

                            3. Bemelegítés, ízületek átmozgatása

                            4. Gerincjóga gyakorlatok

                            5. Levezetés, relaxáció
						</textarea>
				</div>
			</div>
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>

     $(document).ready(function(){

         $("form textarea").prop("readonly",true);

         $("input[name=edit]").on("click",function(){

                 $("textarea").removeAttr("readonly");
         })

	 		 $("input[name=save]").on("click",function(){

                $("textarea").prop("readonly",true);

         })
     })

    </script>

    <script type="text/javascript">
				function oratipusBetoltes(){
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
							 console.log(this.responseText);
							if(this.responseText=="nincs"){
								alert("Hiba történt. Próbálja újra!");
							}
							else {
								const oratipus=JSON.parse(this.responseText);
								document.getElementById("leiras").innerHTML=oratipus.leiras;
								document.getElementById("nev").innerHTML=oratipus.nev;
							}
						 }
						};
						xhttp.open("POST", "szkriptek/ora_tipusDatas.php", true);
						xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhttp.send("id=<?php if(isset($_GET["id"])) echo $_GET["id"]; else echo "1";?>");
				}

        function tipusSzerkesztes(){
                var leiras = document.getElementById("leiras").value;
    				result = window.confirm("Biztosan szeretné menteni a vátoztatásokat?");
					if(result){
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
							if(this.responseText=="OK"){
                                alert("Sikeres mentés!");

                            }
							else alert("Hiba történt. Próbálja újra!");
						 }
						};
						xhttp.open("POST", "szkriptek/oraSzerkDatas.php", true);
						xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhttp.send("id=<?php if(isset($_GET["id"])) echo $_GET["id"]; else echo "1";?>&leiras="+leiras);
					}
        }
    </script>

</body>
