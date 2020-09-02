<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/assets/css/style.css">
	<!-- <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100;400;700&family=Open+Sans:wght@300;400&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
	integrity="sha384-
	fnmOCqbTlWIlj8LyTjo8mOUStjsKC4pOpQbqyi7RrhN7udi9RwHKkMHpvLbHG9Sr"
	crossorigin="anonymous"> -->
	<title>Helper</title>
</head>
<body>
<!-- Header -->
<div class="wrapper">
	<header class="header">
		<div class="container">
			<div class="header__inner">
				<?php
					if ( ($page == "reg") OR ($page == "auth") ){
						?>
						<div id="logo">HELPER</div>
							<nav class="nav">
								
								<a class="nav__link <?php if($page == "reg") {echo "active";} ?>" href="/pages/registr.php">Регистрация</a>
								<a class="nav__link <?php if($page == "auth") {echo "active";} ?>" href="/pages/auth.php">Вход</a>
							</nav>
						<?php 
					} else {
						$sql = "SELECT * FROM register WHERE id =". $_COOKIE["id_user"];

						$result = mysqli_query($connect, $sql);
				    	$row = mysqli_fetch_assoc($result);

						?>
							<a class="nav__link <?php if($page == "index") {echo "active";} ?>" href="/index.php" style="">HELPER</a>
							<nav class="nav">
								<a class="nav__link <?php if($page == "newad") {echo "active";} ?>" href="/pages/newad.php">Добавить объявление</a>
								<a class="nav__link <?php if($page == "privat") {echo "active";} ?>" href="/pages/privateoffice.php">Личный кабинет - <?php echo $row["name"] ?></a>
								<a class="nav__link" href="/pages/exit.php">Выйти</a>
							</nav>

						<?php
					}
				?>
			</div>
		</div>
	</header>

