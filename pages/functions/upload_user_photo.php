<?php
// функция добавления фотографии пользователю
include '../../configs/settings.php';
include '../../configs/db.php';
	// запрос о выборе всего, где айди равен айди из куков
	$sql = "SELECT * FROM register WHERE id=" . $user_auth;
		$result = mysqli_query($connect, $sql);
    	$row = mysqli_fetch_assoc($result);
    		// проверка, сществует ли файл и проверка и ошибки, если ошибок нет, то пропустить дальше
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
				    echo "Файл не загружен";
				}
					//  обновление таблицы с пользователями, для внесения адреса картинки
					$sql = "UPDATE register SET photo = '" . $todb . "' WHERE register.id = '" . $user_auth . "' ";
					// если запрос выполнился
					if ( mysqli_query($connect, $sql) ) {
								echo " запись в бд";
								// закоментаровать header, что бы посмотреть инфо по файлу
								header("location: ../edit_user.php?id=".$user_auth);
							} else {
								echo " НЕзапись в бд";
							}
				}

?>