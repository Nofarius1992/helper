<?php
	// вывод публичной информации о пользователе (страница user_public.php)
$sql = "SELECT * FROM register WHERE id LIKE '" . $_GET["id"] . "'";
$result = mysqli_query($connect, $sql);
$item = mysqli_fetch_assoc($result);


?>