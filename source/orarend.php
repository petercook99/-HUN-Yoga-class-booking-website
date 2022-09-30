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
<html>

<head>
	<title>Órarend</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="orarend.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="date.js"></script>
</head>

<body onload="thisWeek()">
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
			 <a class="nav-link active" href="orarend.php">Órarend</a>
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
			 <a class="nav-link active" href="orarend.php">Órarend</a>
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

	<div class="background">

		<div class="container">
			<div class="title">Órarend</div>

			<div class="week">
				<div class="prev"><button onclick="prevWeek()">Előző hét</button></div>
				<div class="week_date">
					<p id="week_date_p">2021.11.22. - 2021.11.26.</p>
				</div>
				<div class="next"><button onclick="nextWeek()">Következő hét</button></div>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<!--<th class="first_cell"></th>-->
							<th class="bg-black">Hétfő</th>
							<th class="bg-black">Kedd</th>
							<th class="bg-black">Szerda</th>
							<th class="bg-black">Csütörtök</th>
							<th class="bg-black">Péntek</th>
						</tr>
					</thead>
					<tbody id="tabla">
						<tr id="08:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>


						<tr id="09:00:00">
							<td class="bg-light-gray Monday">
							<!--<?php
			 				 if (isset($_SESSION["email"]))
			 				 {
		 				 	?>
								<a href="" target="popup" onclick="window.open('foglalas.php?oktatoID=1&foglalasID=1&oraID=1', 'popup', 'width=400, height=400, resizable=no'); return false;">
									<span class="bg-sky classes">Gerincjóga</span>
								</a>
							<?php
							 	}
							 	else
							 	{
							 ?>
								<a href="#" onclick="alert('A foglaláshoz jelentkezzen be.')">
									<span class="bg-sky classes">Gerincjóga</span>
								</a>
							<?php
						 	}
						 	?>
								<div class="time" id="time-Monday-9">9:00-10:00</div>
								<div class="teacher" id="teacher-Monday-9">Horváth Andrea</div>-->
							</td>

							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="10:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="11:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="12:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="13:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="14:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="15:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="16:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="17:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

						<tr id="18:00:00">
							<td class="bg-light-gray Monday">
							</td>
							<td class="bg-light-gray Tuesday">
							</td>
							<td class="bg-light-gray Wednesday">
							</td>
							<td class="bg-light-gray Thursday">
							</td>
							<td class="bg-light-gray Friday">
							</td>
						</tr>

					</tbody>
				</table>
			</div>


			<?php
				if(isset($_SESSION["admin"])){ ?>
			<p class="title">Új óra felvétele</p>
			<form class="adatok" method="POST" action="szkriptek/orarendEditDatas.php">
			<table class="urlap_tabla">
				<tr>
					<td class="urlap_cella"><label for="kezdes" class="adat1">Kezdete:</label></td>
					<td class="urlap_cella"><input id="kezdes" name="kezdes" type="datetime-local" value="2021-12-06T08:00"></td>
				</tr>
				<tr>
					<td class="urlap_cella"><label for="veg" class="adat1">Vége:</label></td>
					<td class="urlap_cella"><input id="veg" name="veg" type="datetime-local" value="2021-12-06T09:00"></td>
				</tr>
				<tr>
					<td class="urlap_cella"><label for="oktato" class="adat1">Oktató:</label></td>
					<td class="urlap_cella">
						<select id="oktato" name="oktato" onchange="">
						</select>
					</td>
				</tr>
				<tr>
					<td class="urlap_cella"><label for="oratipus" class="adat1">Óra:</label></td>
					<td class="urlap_cella">
						<select id="oratipus" name="oratipus" onchange="">
						</select>
					</td>
				</tr>
				<tr>
					<td class="urlap_cella"><label for="korlat" class="adat1">Létszám:</label></td>
					<td class="urlap_cella"><input id="korlat" name="korlat" type="number">
					</td>
				</tr>
				<tr>
					<td class="urlap_cella"><button class="gomb" type="submit" name="submit">Küldés</button><br></td>
				</tr>
			</table>
			</form>
			<p>Minden adat megadása kötelezeő!</p>

		<?php } ?>

		</div>
	</div>

	<script type="text/javascript">

		function thisWeek(){
			var thisMonday=Date.monday().toString("yyyy.MM.dd.");
			var thisFriday=Date.friday().toString("yyyy.MM.dd.");
			document.getElementById("week_date_p").innerHTML=thisMonday+" - "+thisFriday;
			timeTable(thisMonday, thisFriday);
			oktatok();
			oratipus();
		}
		function prevWeek(){
			let monday=document.getElementById('week_date_p').innerHTML.split('-')[0];
			monday=monday.slice(0, -2); //az utolsó kettő karaktert elhagyja, mert azok egy . és egy szóköz
			monday=new Date(monday);
			prevMonday=monday.add(-7).days().toString("yyyy.MM.dd.");
			let friday=document.getElementById('week_date_p').innerHTML.split('-')[1];
			friday=friday.slice(1, -1); //az első és az utolsó karakter elhagyása
			friday=new Date(friday);
			prevFriday=friday.add(-7).days().toString("yyyy.MM.dd.");
			document.getElementById("week_date_p").innerHTML=prevMonday+" - "+prevFriday;
			timeTable(prevMonday, prevFriday);
			oktatok();
			oratipus();
		}
		function nextWeek(){
			let monday=document.getElementById('week_date_p').innerHTML.split('-')[0];
			monday=monday.slice(0, -2); //az utolsó kettő karaktert elhagyja, mert azok egy . és egy szóköz
			monday=new Date(monday);
			nextMonday=monday.add(7).days().toString("yyyy.MM.dd.");
			let friday=document.getElementById('week_date_p').innerHTML.split('-')[1];
			friday=friday.slice(1, -1); //az első és az utolsó karakter elhagyása
			friday=new Date(friday);
			nextFriday=friday.add(7).days().toString("yyyy.MM.dd.");
			document.getElementById("week_date_p").innerHTML=nextMonday+" - "+nextFriday;
			timeTable(nextMonday, nextFriday);
			oktatok();
			oratipus();
		}

		function deleteClass(foglID){
				result = window.confirm("Biztosan szeretné törölni az órát?");
				if(result){
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					 if (this.readyState == 4 && this.status == 200) {
													 console.log(this.responseText);
						if(this.responseText=="OK"){
															alert("Sikeres törlés!");

													}
						else alert("Hiba történt. Próbálja újra!");
					 }
					};
					xhttp.open("POST", "szkriptek/orarendDeleteDatas.php", true);
					xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xhttp.send("foglID=" + foglID);
					location.reload();
				}
			}

		function timeTable(monday, friday) {
			clearTable();
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				 if(this.responseText=="Nincs") alert("Nincs óra");
				 else{
					 const orak=JSON.parse(this.responseText);
					 //orak[i].oraID, nap, kezdes, veg, nev, oktatoID, tipusnev
					 for (var i = 0; i < orak.length; i++) {
						 	var html=`<?php
	  										if (isset($_SESSION["email"]))
	  										{
	  									 ?>
	  										 <a href="" target="popup" onclick="window.open('foglalas.php?oktatoID=`+orak[i].oktatoID+`&foglalasID=`+orak[i].foglalasID+`&oraID=`+orak[i].oraID+`', 'popup', 'width=400, height=400, resizable=no'); return false;">
	  											 <span class="bg-sky classes">`+orak[i].tipusnev+`</span>
	  										 </a>
	  									 <?php
	  										 }
												 else if (isset($_SESSION["admin"]))
 	 											{
 	 											?>
 													<div>
 													<a href="orarendEdit.php?foglalasID=`+ orak[i].foglalasID +`&kezdes=`+orak[i].kezdes+`&veg=`+orak[i].veg+`&oktatoID=`+orak[i].oktatoID+`">
 														<input type="image" src="kepek/edit-icon.png" class="szerkeszto_ikon">
 													</a>
 													<input type="image" src="kepek/trash-empty-icon.png" class="szerkeszto_ikon" onclick="deleteClass(`+ orak[i].foglalasID +`)"><br><br>
 														<span class="bg-sky classes">`+orak[i].tipusnev+`</span>

 												  </div>
 	  									 	<?php
 	  										}
	  										 else
	  										 {
	  										?>
	  										 <a href="#" onclick="alert('A foglaláshoz jelentkezzen be.')">
	  											 <span class="bg-sky classes">`+orak[i].tipusnev+`</span>
	  										 </a>
	  									 <?php
	  									 }
	  									 ?>
	  										 <div class="time">`+orak[i].kezdes.slice(0, 5)+`-`+orak[i].veg.slice(0,5)+`</div>
	  										 <div class="teacher">`+orak[i].nev+`</div>`;
							var trID=orak[i].kezdes;
							var tdClass=orak[i].nap;
							if(document.getElementById(trID)){ //ha létezik az elem
								let children=document.getElementById(trID).children;
								for (var j = 0; j < children.length; j++) {
				 				 	if(children[j].className.includes(tdClass)) {
										children[j].innerHTML=html;
										children[j].className="bg-white "+tdClass;
									}
			 				  }
							}
					 }
				 }
			}
			};
			xhttp.open("POST", "szkriptek/orarendDatas.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("heteleje="+monday+"&hetvege="+friday);
		}

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
						options+='<option value="'+oktatok[i].id+'">'+oktatok[i].nev+'</option>';
					}
					document.getElementById("oktato").innerHTML=options;
				}
			 }
			};
			xhttp.open("POST", "szkriptek/oktatoDatas.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("id=0");
		}

		function oratipus(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			 if (this.readyState == 4 && this.status == 200) {
				let nincsOra=false;
				if(this.responseText=="nincs") {nincsOra=true;console.log("hehif");}
				else {
					const oratipusok=JSON.parse(this.responseText);
					let options='';
					for (var i = 0; i < oratipusok.length; i++) {
						options+='<option value="'+oratipusok[i].id+'">'+oratipusok[i].tipusnev+'</option>';
					}
					document.getElementById("oratipus").innerHTML=options;
				}
			 }
			};
			xhttp.open("POST", "szkriptek/ora_tipusDatas.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("id=0");
		}

		function clearTable(){
			let children=document.getElementById("tabla").children;
			for (var i = 0; i < children.length; i++) {
				grandchildren=children[i].children;
				for (var j = 0; j < grandchildren.length; j++) {
					grandchildren[j].innerHTML="";
					day=grandchildren[j].className.split(" ")[1];
					grandchildren[j].className="bg-light-gray "+day;
				}
			}
		}


	</script>
</body>

</html>
