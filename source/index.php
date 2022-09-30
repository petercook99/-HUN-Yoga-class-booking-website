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

	if(!isset($_SESSION["emailek"]) && isset($_SESSION["admin"])){
		  echo '<form action="szkriptek/menuDatas.php" method="POST" id="form"><button type="submit" id="button"><input type="hidden" name="menu" value="emailek"></form>
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

<html lang="hu">

	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="kezdolap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<style media="screen">

		</style>
	</head>

	<body>

		<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
         <ul class="nav nav-tabs">

           <li class="nav-item">
             <a class="nav-link active" href="index.php"><img src="kepek/Very-Basic-Home-icon.png"></a>
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

		<div class="hatter">
			<img src="kepek/joga.jpg" class="fokep">
			<div class="feliratok">
				<h1 id="focim">Jóga órák mindenkinek</h1>
				<form action="#joga_leiras">
					<input class="gomb" type="submit" value="Tudj meg többet!" />
				</form>
			</div>
		</div>
		<div class="szakasz_2">
			<h1 id="joga_leiras">A jóga hatásai</h1>

			<div class="szoveg_doboz">
				<h2>Csökkentheti a stresszt</h2>
				<img src="kepek/stressz.jpg" class="kiskepek">
				<p>A jóga arról ismert, hogy képes enyhíteni a stresszt és elősegíteni a pihenést. Valójában több tanulmány kimutatta, hogy csökkentheti a kortizol, az elsődleges stresszhormon szekrécióját.

					Egy tanulmány bebizonyította a jóga erőteljes hatását a stresszre, 24 nő nyomon követésével, akik érzelmileg szorongónak tartották magukat. Három hónapos jóga program után a nőknél lényegesen alacsonyabb volt a kortizol szintje. A stressz, szorongás, fáradtság és depresszió szintje is alacsonyabb volt.

					Egy másik, 131 emberrel végzett tanulmány hasonló eredményeket hozott, amelyek azt mutatták, hogy a 10 hetes jóga segített csökkenteni a stresszt és a szorongást. Ez az életminőség és a mentális egészség javítását is segítette. Ha önmagában vagy a stressz enyhítésének egyéb módszereivel, például meditációval együtt alkalmazzák, igazán a jóga előnye hatékony módszer lehet a stressz kordában tartására.

					Összeségében a tanulmányok azt mutatják, hogy a jóga hatásai segíthetnek a stressz enyhítésében és a kortizol stressz hormon szintjének csökkentésében.</p>
			</div>

			<div class="szoveg_doboz">
				<h2>Elősegítheti az alvás minőségét</h2>
				<img src="kepek/alvas.jpg" class="kiskepek2">
				<p>A rossz alvásminőség az elhízással, a magas vérnyomással és a depresszióval társult más rendellenességek mellett. Tanulmányok azt mutatják, hogy a jóga beépítése a rutinba elősegítheti a jobb alvást.

					Egy 2005-ös vizsgálat során 69 idős beteget osztottak be jógázni, gyógynövényes készítményt szedni, vagy a kontrollcsoport tagjaivá válni. A jógacsoport gyorsabban aludt el, hosszabb ideig aludt és jobban kipihentnek érezte magát reggel, mint a többi csoport.

					Egy másik tanulmány a jóga alvásra gyakorolt hatását vizsgálta limfómás betegeknél. Megállapították, hogy ez csökkentette az alvászavarokat, javította az alvás minőségét és időtartamát, és csökkentette az alvási gyógyszerek iránti igényt. Bár működése nem világos, a jóga kimutatta, hogy növeli a melatonin, az alvást és az ébrenlétet szabályozó hormon szekrécióját.

					A jóga jelentős hatással van a szorongásra, a depresszióra, a krónikus fájdalmakra és a stresszre is.</p>
			</div>

					<div class="szoveg_doboz">
				<h2>Javítja a rugalmasságot és az egyensúlyt</h2>
				<img src="kepek/hajlekonysag.jpg" class="kiskepek">
				<p>Sokan hozzáadják a jógát fitneszruhájukhoz a rugalmasság és az egyensúly javítása érdekében. Számos kutatás támasztja alá ezt az előnyöket, bizonyítva, hogy optimalizálni tudja a teljesítményt a pózok használatával, amelyek a rugalmasságot és az egyensúlyt célozzák meg.

					Egy nemrégiben készült tanulmány megvizsgálta a 10 hetes jóga 26 fő egyetemi sportolóra gyakorolt hatását. A jógázás jelentősen megnövelte a rugalmasság és az egyensúly több mértékét a kontroll csoporthoz képest.</p>
			</div>
		</div>
		<script type="text/javascript">
			/*function loadDatas() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				 if (this.readyState == 4 && this.status == 200) {
				 }
				};
				xhttp.open("POST", "szkriptek/profilDatas.php", true);
				xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhttp.send("");
			}*/
		</script>
	</body>


</html>
