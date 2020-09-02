<?php
// Личный кабинет
$page = "privat";
include "../configs/db.php";
// настройки, тут лежи проверка на куки, для вхда или выхода.
include "../configs/settings.php";
include "../parts/header.php";

?>
<?php
	$sql2 = "SELECT * FROM register WHERE id =" . $user_auth;
	$result2 = mysqli_query($connect, $sql2);
	$item2 = mysqli_fetch_assoc($result2);

	// var_dump($item2['id']);				
?>

<div class="container">
	<div class="cont">
		<div class="left_coll">
				<h4 class="left__coll_title">Профиль пользователя</h4>
					

				<div class="user_img">
					<img class="cont__img" src="../<?php echo $row['photo'] ?>">
					<div class="user_links">
						<a class="button link" href="private_mess.php?id=<?php echo $item2['id']; ?>" >Cообщения</a>
						<a class="button link" href="edit_user.php?id=<?php echo $item2['id']; ?>" >Редактировать</a>
					</div>
				</div>
				
				
					<div class="user_info">
						<h4 class="user__ifo_text"><span>Имя:</span> <?php echo $item2['name']; ?></h4>

						<h4 class="user__ifo_text"><span>Фамилия:</span> <?php echo $item2['surname']; ?></h4>
			
						<h4 class="user__ifo_text"><span>Номер телефона:</span> <?php echo $item2['phone_num']; ?></h4>
				
						<h4 class="user__ifo_text"><span>Адрес:</span> <?php echo $item2['adress_user']; ?></h4>
				
						<h4 class="user__ifo_text"><span>Конфессия:</span> <?php echo $item2['denomination']; ?></h4>
			
						<h4 class="user__ifo_text"><span>Название церкви:</span> <?php echo $item2['church_name']; ?></h4>
				
						<h4 class="user__ifo_text"><span>Адрес церкви:</span> <?php echo $item2['church_adress']; ?></h4>
				
						<h4 class="user__ifo_text"><span>Номер пастора:</span> <?php echo $item2['pastor_num']; ?></h4>
				
						<h4 class="user__ifo_text"><span>Адрес электронной почты:</span> <?php echo $item2['email']; ?></h4>
					</div>
					
			
					
		</div>

			
				
		<div class="right_coll">
		<?php
		// тестовый вывод изображений
		$sql = "SELECT * FROM ads WHERE user_id =" . $user_auth;
		$result = mysqli_query($connect, $sql);
		// цикл для вывода
		while ($row = mysqli_fetch_assoc($result)) {
			// объявление 
			$sql_1 = "SELECT * FROM register WHERE id=" . $user_auth;
     		 $result_1 = mysqli_query($connect, $sql_1);
     		 $row_1 = mysqli_fetch_assoc($result_1);
			?>
			<div class="ad">
				<img class="ad_img" src="../<?php echo $row['photo'] ?>">
				<div class="ad_info">
					<h4 class="ad__info_text"> <span>№:</span> <?php echo $row['id']; ?></h4>
					<h4 class="ad__info_text"> <span>Телефон:</span> <?php echo $row_1['phone_num']; ?></h4>
					<h4 class="ad__info_text"> <span>Город:</span> <?php echo $row['city']; ?></h4>
					<h4 class="ad__info_text"> <span>Адрес:</span> <?php echo $row['adress_kv']; ?></h4>

				</div>

				<a class="button ad_link" href="edit_ad.php?id=<?php echo $row['id'] ?>" >Редактировать</a>

				
			</div><!-- /.ad -->
			<?php
		}
		?>
		</div> 
	</div>
</div>

<?php
	include "../parts/footer.php";
?>