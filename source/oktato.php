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
  <link rel="stylesheet" type="text/css" href="chat.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="kezdolap.css">
</head>

<body onload="oktatoBetoltes()">

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul class="nav nav-tabs">

		  <li class="nav-item">
			 <a class="nav-link" href="index.php"><img src="kepek/Very-Basic-Home-icon.png"></a>
		  </li>

		  <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Oktatók</a>
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
		<div class="oldal">
			<div class="adatlap">
				<input type="text" class="cim szerkadat" id="nev" value="Horváth Andrea" readonly="readonly"><br>


				<div class="adatok">
					<p class="adat1">E-mail-cím:</p>
					<p class="adat2" id="oktemail">horvath.andrea@gmail.com</p>
				</div>


				<div class="adatok">
					<label class="adat1">Tapasztalat (év): <input type="text" class="szerkadat" id="tapasztalat" value="8" readonly="readonly">
					<?php
					if ((isset($_SESSION["oktato"]) && $_SESSION["id"]==$_GET["id"]) || isset($_SESSION["admin"]))
					{
					?>
					<input type="image" src="kepek/edit-icon.png" class="szerkeszto_ikon" name='edit2' value='edit'>
					<input type="image" src="kepek/Save-icon.png" class="szerkeszto_ikon" name='save2' value='save' onclick="oktatoSzerkesztes()">
					<?php
					} ?></label><br>
				</div>


				<div class="adatok">
					<p class="adat1">Bemutatkozás:
					<?php
					if ((isset($_SESSION["oktato"]) && $_SESSION["id"]==$_GET["id"]) || isset($_SESSION["admin"]))
					{
					?>
					<input type="image" src="kepek/edit-icon.png" class="szerkeszto_ikon" name='edit' value='edit'>
					<input type="image" src="kepek/Save-icon.png" class="szerkeszto_ikon" name='save' value='save' onclick="oktatoSzerkesztes()"></p><br>
					<?php
					} ?>
					<textarea id="bemutatkozas" readonly="readonly">2008 óta tartok jóga órákat és tanfolyamokat belföldön és külföldön egyaránt, magyar, angol és spanyol nyelven. Rengeteg tanfolyamot végeztem, kilencszer jártam Indiában hosszabb tanulmányutak keretében jógaterápiát és ájurvédát kutatva, napi szinten gyakorlok és foglalkozom a jóga terápiával és filozófiával. Kezdőket és haladókat is nagyon szeretek tanítani, 18 és 80 év korhatár között. Arra törekszem, hogy motiváljam, inspiráljam a gyakorlókat, hogy ők maguk lássanak rá testi lelki problémáikra. Fáradhatatlanul igyekszem nekik a maximális tudást átadni közérthetően, modern emberi nyelvre lefordítva, hogy azt beépítsék hétköznapjaikba, kigyógyuljanak betegségeikből vagy megelőzzék a hajlamaik szerint később kialakuló betegségeiket. Jövőképem, hogy a jóga tudományát minél szélesebb körhöz, hatékonyan eljuttassam (idősebbek, tinik, férfiak), és felkészült, hatékony munkára képes jógaoktatókat képezek ki, akiknek kérdéseire, meglátásaira mindig elérhető maradok.
					</textarea>
				</div>
			</div>
		</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>

     $(document).ready(function(){

		 $("form input[type=text]").prop("readonly",true);

         $("input[name=edit2]").on("click",function(){

                 $("input[type=text]").removeAttr("readonly");
         })

         $("form textarea").prop("readonly",true);

         $("input[name=edit]").on("click",function(){

                 $("textarea").removeAttr("readonly");
         })

		 $("input[name=save2]").on("click",function(){

         $("input[type=text]").prop("readonly",true);
         })

		 $("input[name=save]").on("click",function(){

         $("textarea").prop("readonly",true);
         })
     })
    </script>

        <script type="text/javascript">

				function oktatoBetoltes(){
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
              if(this.responseText=="nincs"){
								alert("Hiba történt. Próbálja újra!");
							}
							else {
								const oktato=JSON.parse(this.responseText);
								document.getElementById("bemutatkozas").innerHTML=oktato.leiras;
								document.getElementById("tapasztalat").value=oktato.tapasztalat;
								document.getElementById("oktemail").innerHTML=oktato.email;
								document.getElementById("nev").value=oktato.nev;
							}
						 }
						};
						xhttp.open("POST", "szkriptek/oktatoDatas.php", true);
						xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhttp.send("id=<?php if(isset($_GET["id"])) echo $_GET["id"]; else echo "1";?>");
        }

        function oktatoSzerkesztes(){
                var tapasztalat = document.getElementById("tapasztalat").value;
                var leiras = document.getElementById("bemutatkozas").value;
    				result = window.confirm("Biztosan szeretné menteni a vátoztatásokat?");
					if(result){
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
                             console.log(this.responseText);
							if(this.responseText=="OK"){
                                alert("Sikeres mentés!");

                            }
							else alert("Hiba történt. Próbálja újra!");
						 }
						};
						xhttp.open("POST", "szkriptek/oktatoDatas2.php", true);
						xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xhttp.send("id=<?php if(isset($_GET["id"])) echo $_GET["id"]; else echo "1";?>&tapasztalat="+tapasztalat+"&leiras="+leiras);
					}
        }
    </script>


</body>
