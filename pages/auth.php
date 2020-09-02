<?php
$page = "auth";
// страница авторизации
include "../configs/db.php";
?>

<?php
	include "../parts/header.php";
?>
<!-- форма для отправки -->
<div class="container">
	<div class="wrapper__regauth">
		<div class="regauth">
			<form class="auth" action="auth.php" method="post">
				<p class="info">Почта</p>
				<input class="input" type="email" name="email" placeholder="email">

				<p class="info">Пароль</p>
				<input class="input" type="password" name="password" placeholder="password">

				<button class="button" type="submit">Войти</button>
			</form>

			<?php
		// прверка на существование и не пустоту запросов
			if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"] != "" && $_POST["password"] != "") {
				// приведение поля e-mail в нижний регистр
				$email = strtolower($_POST['email']);
				// Сравниваем пароль и емаил
				$sql = "SELECT * FROM register WHERE email LIKE '" . $email . "' AND password LIKE '" . $_POST['password'] . "' ";
		    	$result = mysqli_query($connect, $sql);
		    	$col_user = mysqli_num_rows($result);
		    		// если количество пользователей равно 1, то 
			    	if( $col_user == 1 ) {
			    		// Создаем куку,которая хранит ID пользователя и перенаправляем на главную страницу.
			    		$user = mysqli_fetch_assoc($result);
				  		setcookie("id_user", $user['id'], time() + 60*60, "/");
						header("location: ../index.php");
						
				  	} else {
			    	echo "<h4>Такого пользователя не существует! Зарегестрируйтесь.</h4>";
			  		}
				} 
			?>
		</div>
	</div> <!-- /.wrapper-regaut -->
</div>
	
<?php
	include "../parts/footer.php";
?>