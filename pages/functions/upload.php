<?php
include '../../configs/settings.php';
include '../../configs/db.php';
// Функция загрузки и редактирования фтографий с объявления
if (isset($_POST['city']) && isset($_POST['adress_kv']) && isset($_POST['description']) && isset($_POST['infrast']) && isset($_POST['attractions']) && isset($_POST['terms']) && isset($_POST['status']) && 
	$_POST['city'] !="" && $_POST['adress_kv'] !="" && $_POST['description'] != "" && $_POST['infrast'] != "" && $_POST['attractions'] != "" && $_POST['terms'] != "" && $_POST['status'] != "" 
	) {
	// выбрать всех, где id = id из куков
	$sql = "SELECT * FROM register WHERE id=" . $user_auth;
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);
		// проверка, существует ли запрос с файлом
		if (isset($_FILES) && $_FILES['uploadfile']['error'] == 0){
			// путь к папке сфайлами(на две директории выше этого скрипта)
			$path = 'files/';
			// Получаем расширение загруженного файла
			$extension = strtolower(substr(strrchr($_FILES['uploadfile']['name'], '.'), 1));
			// Рандомное имя фалйла из 13 символов(Нет проверки на уникальность, так что в теории, файлы могут повторятся(Хотелка: Сделать проверку на уникальность названя файлов в папке, если будет время))
			$filename = uniqid();
			// Собираем адрес файла назначения для отправки в бд
			$todb = $path  . $filename . '.' . $extension;
			// И адресс для згрузки
			$target = '../../' . $path  . $filename . '.' . $extension;
			
			if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target) ) {
			    echo "Файл загружен";
			} else {
			    echo "Загрузка не прошла";
			}
			// если существует запос со страницы редактирования объявления, то выполнить UPDATE, а не INSERT
			if (isset($_POST['edit'])){

		 	$sql = "UPDATE ads SET city = '" . $_POST["city"] . "', adress_kv = '" . $_POST["adress_kv"] . "', description = '" . $_POST["description"] . "', infrast = '" . $_POST["infrast"] . "', attractions = '" . $_POST["attractions"] . "', terms = '" . $_POST["terms"] . "', status = '" . $_POST["status"] . "', photo = '" . $todb . "' WHERE ads.id = '" . $_POST["id"] . "'";
			} else {
				$sql = "INSERT INTO ads (user_id, user_name, phone_num, city, adress_kv, description, infrast, attractions, terms, status, photo) VALUES ('". $row['id'] . "', '". $row['name'] . "', '". $row['phone_num'] . "', '". $_POST['city'] . "', '". $_POST['adress_kv'] . "', '". $_POST['description'] . "', '". $_POST['infrast'] . "', '". $_POST['attractions'] . "', '". $_POST['terms'] . "', '". $_POST['status'] . "', '". $todb . "')";
			}
			// если какой то из запрсов сработал, то идет перенапрвление в личный кабинет
			if ( mysqli_query($connect, $sql) ) {
			
				echo ("<script LANGUAGE='JavaScript'>
									    window.alert('Ваше объявление добавлено');
									    window.location.href='../privateoffice.php';
									    </script>");
			} else {
				echo " НЕзапись в бд";
			}
		} else {
			// если файл не выбран, то продолжить без файлаы
			echo "файла нет";
			if (isset($_POST['edit'])) {
				$sql = "UPDATE ads SET city = '" . $_POST["city"] . "', adress_kv = '" . $_POST["adress_kv"] . "', description = '" . $_POST["description"] . "', infrast = '" . $_POST["infrast"] . "', attractions = '" . $_POST["attractions"] . "', terms = '" . $_POST["terms"] . "', status = '" . $_POST["status"] . "' WHERE ads.id = '" . $_POST["id"] . "' ";
			}

			if ( mysqli_query($connect, $sql) ) {
			
				echo ("<script LANGUAGE='JavaScript'>
									    window.alert('Ваше объявление отредактировано');
									    window.location.href='../privateoffice.php';
									    </script>");
			} else {
				echo " НЕзапись в бд";
			}
		}

	} else {
		// Конец самой первой проверки
	}
?>