<?php
$page = "reg";
//Функциональная модель страницы регистрации
include "../configs/db.php";
include "../parts/header.php";

?>

<div class="container">
	<div class="wrapper__regauth">
		<div class="regauth">
		<!-- Форма для отправки данных -->
			<form action="registr.php" method="post">

				<input class="input reg" type="text" name="name" placeholder="Имя" autocomplete="off">

				<input class="input reg" type="text" name="surname" placeholder="Фамилия" autocomplete="off">

				<input class="input reg" type="text" name="phone_num" placeholder="Номер телефона" autocomplete="off">

				<input class="input reg" type="text" name="adress_user" placeholder="Адресс проживания" autocomplete="off">

				<input class="input reg" type="text" name="denomination" placeholder="Конфессия" autocomplete="off">

				<input class="input reg" type="text" name="church_name" placeholder="Название церкви" autocomplete="off">

				<input class="input reg" type="text" name="church_adress" placeholder="Адресс церкви" autocomplete="off">

				<input class="input reg" type="text" name="pastor_num" placeholder="Номер пастора" autocomplete="off">

				<input class="input reg" type="email" name="email" placeholder="e-mail">

				<input class="input reg" type="password" name="password" placeholder="Пароль">

				<p class="info">Все поля должны быть заполнены!</p>
				
				<button class="button">Зарегестрироваться</button>
			
			</form>
			<!-- ссылка для  -->
			
			<?php
				// Проверка на существование и заполненность всех полей в форме
				if( 
					isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["phone_num"]) && isset($_POST["adress_user"]) && isset($_POST["denomination"]) &&
					isset($_POST["church_name"]) && isset($_POST["church_adress"]) && isset($_POST["pastor_num"]) && isset($_POST["email"]) && isset($_POST["password"])

				  && $_POST["name"] != "" && $_POST["surname"] != "" && $_POST["phone_num"] != "" && $_POST["adress_user"] != ""  && $_POST["denomination"] != ""
					 && $_POST["church_name"] != ""  && $_POST["church_adress"] != ""  && $_POST["pastor_num"] != ""  && $_POST["email"] != ""  && $_POST["password"] != "" 
					){
				  	
				  	// Сравнение полученных данный с формы с данными в БД
					$sql_1 = "SELECT * FROM register WHERE email LIKE '" . $_POST['email'] . "' OR phone_num LIKE '" . $_POST['phone_num'] . "' ";
					$result_1 = mysqli_query($connect, $sql_1);
					$rows_col = mysqli_num_rows($result_1); 
					    // Проверка на совпадение по номеру телефона и емайлу
					    if ($rows_col >= 1) {
					    	?>
							 	<script type="text/javascript">alert('Такой пользователь уже существует');</script>
							 <?php
				    		
				    		
					    } else {
					    	var_dump($rows_col);
					    	// приведение поля e-mail в нижний регистр
					    	$email = strtolower($_POST['email']);
					    	// запись в БД даных из формы
					    	$sql = "INSERT INTO register (name, surname, phone_num, adress_user, denomination, church_name, church_adress, pastor_num, email, password) VALUES ('" . $_POST["name"] . "', '" . $_POST["surname"] . "', '" . $_POST["phone_num"] . "', '" . $_POST["adress_user"] . "', '" . $_POST["denomination"] . "', '" . $_POST["church_name"] . "', '" . $_POST["church_adress"] . "', '" . $_POST["pastor_num"] . "', '" . $email . "', '" . $_POST["password"] . "');";
				    	
							  if( mysqli_query($connect, $sql) ) {
							  	// Если все прошло как надо - перенаправление на страницу авторизации
							 	echo ("<script LANGUAGE='JavaScript'>
									    window.alert('Можете авторизоваться');
									    window.location.href='auth.php';
									    </script>");
							 		 // header("location: auth.php");
							  } else {
							    echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
							  }
							}
				    // }
				} else {
					echo "";
				}
				?>
		</div> <!-- /.regaut -->
	</div> <!-- /.wrapper-regaut -->
</div>

<?php
	include "../parts/footer.php";
?>

