<?php
	// вывод объявлений
$sql = "SELECT * FROM ads WHERE id LIKE '" . $_GET["id"] . "'";
$result = mysqli_query($connect, $sql);
$item = mysqli_fetch_assoc($result);

?>

<!--- Дальше идет HTML-код с полями, эту функцию подкючаем через include в местах где неоюходимо вывести сообщение --->