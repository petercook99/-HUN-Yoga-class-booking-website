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

<html lang="hu">

	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/361c4d2a14.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="kezdolap.css">
		<link rel="stylesheet" type="text/css" href="chat.css">
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
 				  } ?>
	         </div>
	       </li>
	       <li class="nav-item dropdown">
	         <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Óratípusok</a>
	         <div class="dropdown-menu">
					<?php for($i = 0 ; $i < count($_SESSION['tipusID']) ; $i++){
 					 echo '<a class="dropdown-item" href="ora_tipus.php?id='.$_SESSION["tipusID"][$i].'">'.$_SESSION["tipusNev"][$i].'</a>';
 				 } ?>
	         </div>
	       </li>
	 	  <li class="nav-item">
	         <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeVI8NCe8HrNp6_XH8PEPIRQKtcRRf_skiasJYFAiSa_CuJZQ/viewform">Magánórára jelentkezés</a>
	       </li>
	       <li class="nav-item">
	         <a class="nav-link" href="orarend.php">Órarend</a>
	       </li>
				<li class="nav-item">
					<a class="nav-link active" href="register.php">Regisztráció</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php">Bejelentkezés</a>
				</li>
			</ul>
		</nav>
		<div class="loginPage">
			<div class="loginDiv">
				<form action="szkriptek/registerDatas.php" method="post">
					<input type="email" class="loginInput" name="email" placeholder="&#xf003; Email" style="font-family:Arial, FontAwesome"><br>
		         <input type="password" class="loginInput" name="pw" placeholder="&#xf023; Jelszó" style="font-family:Arial, FontAwesome"><br>
					<input type="password" class="loginInput" name="pwrepeat" placeholder="&#xf023; Jelszó megint" style="font-family:Arial, FontAwesome"><br>
					<input type="text" class="loginInput" name="lname" placeholder="&#xf2b9; Vezetéknév" style="font-family:Arial, FontAwesome"><br>
					<input type="text" class="loginInput" name="fname" placeholder="&#xf2b9; Keresztnév" style="font-family:Arial, FontAwesome"><br>
					<input type="text" class="loginInput" name="phone" placeholder="&#xf095; Telefonszám" style="font-family:Arial, FontAwesome"><br>
					<button class="gomb"type="submit" name="submit">Regisztráció</button>
				</form>
	      </div>
		</div>

		<!--<div id="chatDiv">
			<p id="chatP">Chat</p>
			<div id="chatMessagesDiv">
			</div>
			<div id="chatInput">
				<input type="text" id="chatText" placeholder="Írja be az üzenetet.">
				<button type="button" id="sendBtn" onclick="sendMessage()">Küld</button>
			</div>
		</div>-->
	</body>


	<script type="text/javascript">
	//chat
	function sendMessage(){
		let text=document.getElementById("chatText").value;
		let messages=document.getElementById("chatMessagesDiv").innerHTML;
		messages+='<div class="msgDiv"><p class="msg">'+text+'</p></div>';
		document.getElementById("chatMessagesDiv").innerHTML=messages;
		document.getElementById("chatText").value="";
	}

	</script>


</html>
