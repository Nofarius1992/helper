<?php
include '../../configs/settings.php';
include '../../configs/db.php';
// отправка сообщеня пользователю с помощью аякса
$page = "privat";

	if (isset($_POST['message']) && $_POST['message'] !="") {
		$sql = "INSERT INTO `messages` (`komu_user_id`, `ot_user_id`, `text`) VALUES 
		('" . $_POST['komu_user_id'] . "', '" . $_POST['ot_user_id'] . "', '" . $_POST['message'] . "')";

		if ( mysqli_query($connect, $sql) ) {
			
		} else {
			echo "Что то не так";
		}
	}
		$curr_user = $_POST['komu_user_id'];

      	include "messagelist.php";

?>