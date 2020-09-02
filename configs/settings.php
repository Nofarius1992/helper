<?php
// если куков нет(авторизация не пройдна) - не пустит на index.php
if(isset($_COOKIE['id_user']) ){
	$user_auth = $_COOKIE['id_user'];
} else {
	header('location: ../pages/auth.php');
}

?>