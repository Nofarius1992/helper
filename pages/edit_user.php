<?php
// страница редктирования пользователя
$page = "privat";
include "../configs/db.php";
// настройки, тут лежи проверка на куки, для вхда или выхода.
include "../configs/settings.php";
include "../parts/header.php";
?>

<div class="container">
	<div class="cont ">
		<?php

			if (isset($_GET['id'])) {
		
				$sql = "SELECT * FROM register WHERE id =" . $_GET["id"];
				$result = mysqli_query($connect, $sql);
				$item = mysqli_fetch_assoc($result);
				
			}

		?>
		<div class="edit__user_info" >
			<h4 class="edit__user_title">Редактирование профиля</h4>
			<form action="functions/edit_profile.php" method="POST">
				<input class="input" type="hidden" name="id" value="<?php echo $item['id']; ?>">
				<div class="wrapper__flex_edit">
					<label>Имя:</label>
					<input class="input" type="text" name="name" placeholder="Имя" autocomplete="off" value="<?php echo $item['name']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Фамилия:</label>
					<input class="input" type="text" name="surname" placeholder="Фамилия" autocomplete="off" value="<?php echo $item['surname']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Телефон:</label>
					<input class="input" type="text" name="phone_num" placeholder="Номер телефона" autocomplete="off" value="<?php echo $item['phone_num']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Адрес:</label>
					<input class="input" type="text" name="adress_user" placeholder="Адресс проживания" autocomplete="off" value="<?php echo $item['adress_user']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Деноминация:</label>
					<input class="input" type="text" name="denomination" placeholder="Конфессия" autocomplete="off" value="<?php echo $item['denomination']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Церковь:</label>
					<input class="input" type="text" name="church_name" placeholder="Название церкви" autocomplete="off" value="<?php echo $item['church_name']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Адрес церкви:</label>
					<input class="input" type="text" name="church_adress" placeholder="Адресс церкви" autocomplete="off" value="<?php echo $item['church_adress']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Телефон пастора:</label>
					<input class="input" type="text" name="pastor_num" placeholder="Номер пастора" autocomplete="off" value="<?php echo $item['pastor_num']; ?>">
				</div>
				<div class="wrapper__flex_edit">
					<label>Почта:</label>
					<input class="input" type="email" name="email" placeholder="е-маил"  value="<?php echo $item['email']; ?>">
				</div>
				
				<button class="button " type="submit">Редактировать профиль</button>

			</form>
		</div>
		<!-- редактирование фото к профилю -->
		<div class="edit__photo" >

			<h4 class="edit__photo_title">Редактировать фото к профилю</h4>

			<img class="cont__img" src="../<?php echo $item['photo'] ?>">

			<form action="functions/upload_user_photo.php" method="post" enctype="multipart/form-data">
				<label id="lablefile" for="file">Загрузить фото</label>
				
				<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
				<input class="inputfile" id="file" type="file" name="uploadfile"/>
					<!-- смена названия кнопки -->
					<script type="text/javascript"> 
						
						var fileget = document.getElementById("file");
						var lablefile = document.querySelector("#lablefile");
						fileget.onchange = function(){
							lablefile.innerText = "Добавлено: " + fileget.files[0].name;
						} 
					 </script>
				<button class="button" type="submit">Применить</button>

			</form>
		

		</div>
	</div>
</div>

<?php
	include "../parts/footer.php";
?>