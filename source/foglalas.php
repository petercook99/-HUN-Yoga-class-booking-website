<?php
	session_start();
	if(isset($_GET["oktatoID"])){
		$oktatoID=$_GET["oktatoID"];
		$foglalasID=$_GET["foglalasID"];
		$oraID=$_GET["oraID"];
	}
?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<title>Foglalás</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="foglalas.css">
	</head>

	<body onload="loadDatas()">
		<div class="background">
			<div class="container">
				<div class="title">Időpont foglalása</div>
				<p>Egy órára jelentkezhet már meglévő bérletével, vagy vásárolhat egyszeri alkalmat is.</p>
				<p>Fizetés módjának kiválasztása:</p>
				<form action="szkriptek/foglalasDatas.php" method="post">
					<input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">  <!--VALAMI NEM JÓ, crash-->
					<input type="hidden" name="oktatoID" value="<?php echo $oktatoID ?>">
					<input type="hidden" name="foglalasID" value="<?php echo $foglalasID ?>">
					<input type="hidden" id="alkalmak" name="alkalmak" value="0">
					<input type="radio" id="berlet" value="berlet" name="mod">
					<label for="berlet">Bérlet használata</label><br>
					<input type="radio" id="egyszeri" value="egyszeri" name="mod">
					<label for="egyszeri">Egyszeri alkalom vásárlása</label><br><br>
					<button type="submit" id="foglalButton" name="submit">Foglalás</button>
					<button onclick="javascript:window.close()">Mégse</button>
					<p id="berletuzenet"></p>
					<p id="foglalasuzenet"></p>
				</form>
			</div>
		</div>

		<script type="text/javascript">
		//csekkolni, hogy van-e bérlet és hogy már jelentkezett-e erre az órára

			function loadDatas(oktatoID, oraID) { //lekérni az óraID-t és oktatoID-t és összehasonlítani
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
					var berletekstr=this.responseText.split("%%")[0];
				 	var foglalasokstr=this.responseText.split("%%")[1];
					var message='';
					var vanberlet=false;
					var uresfoglalas=false, uresberlet=false;
					if(foglalasokstr=="nincs"){
						uresfoglalas=true;
					}
					if(berletekstr=="nincs"){
						message='Ön még nem rendelkezik bérlettel. Vásároljon most <a href="berlet.php" onclick="javascript:window.close()">ezen a linken</a>, vagy foglaljon egyszeri alkalomra.';
						document.getElementById("berletuzenet").innerHTML=message;
						document.getElementById("egyszeri").checked;
						uresberlet=true;
					}
					if(!uresfoglalas && !uresberlet) {
						const berletek=JSON.parse(berletekstr);
						var foglalasok=foglalasokstr.split(';');
						for (var i = 0; i < foglalasok.length; i++) {
							if(foglalasok[i]==<?php echo $oraID ?>) {
								message='Erre az órára már jelentkezett.';
								document.getElementById("foglalasuzenet").innerHTML=message;
								document.getElementById("foglalButton").disabled=true;
								break;
							}
						}
						for (var i = 0; i < berletek.length; i++) {
							if(berletek[i].oktatoid==<?php echo $oktatoID ?>){
								message='Ön rendelkezik bérlettel ehhez az oktatóhoz. Kívánja felhasználni azt? (Felhasználható még '+berletek[i].alkalmak+' alkalommal)';
								document.getElementById("berletuzenet").innerHTML=message;
								document.getElementById("berlet").checked;
								document.getElementById("alkalmak").value=berletek[i].alkalmak;
								vanberlet=true;
								break;
							}
						}
						if(!vanberlet){
							message='Ön nem rendelkezik bérlettel ehhez az oktatóhoz. Vásároljon most <a href="berlet.php" onclick="javascript:window.close()">ezen a linken</a>, vagy foglaljon egyszeri alkalomra.';
							document.getElementById("berletuzenet").innerHTML=message;
							document.getElementById("egyszeri").checked;
						}
					}
				}
				};
				xhttp.open("POST", "szkriptek/profilDatas.php", true);
				xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhttp.send("email=<?php echo $_SESSION["email"];?>&profil=0");
			}
		</script>
	</body>
</html>
