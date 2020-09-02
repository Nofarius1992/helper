<?php
$page = "ads";
    include "../configs/db.php";
    include "../configs/settings.php";
    include "../parts/header.php";
?>
	<div class="container">
		<div class="wrapper__ads_page">
<?php
	// подключение функии вывода объявлений
	include "functions/get_ads.php";
	?>
			<h2>Объявление</h2>
			<div class="wrapper__ads_flex">
				<img class="ads__page_img" src="../<?php echo $item['photo'] ?>">
			
				<div class="wrapper__ads_info">
					<h4><span class="span">Номер телефона:</span> <?php echo $item['phone_num']; ?></h4>

					<h4><span class="span">Город:</span> <?php echo $item['city']; ?></h4>
			
					<h4><span class="span">Адрес картиры:</span> <?php echo $item['adress_kv']; ?></h4>
				
					<h4><span class="span">Инфраструктура:</span> <?php echo $item['infrast']; ?></h4>
			
					<h4><span class="span">Достопримечательности:</span> <?php echo $item['attractions']; ?></h4>
			
					<h4><span class="span">Сроки:</span> <?php echo $item['terms']; ?></h4>
			
					<h4><span class="span">Статус:</span> <?php echo $item['status']; ?></h4>

					<h4><span class="span">Описание:</span> <?php echo $item['description']; ?></h4>
				</div>
			</div>
			
			<a class="button link_user" href="user_public.php?id=<?php echo $item['user_id'] ?>">Просмотреть профиль пользователя</a>
		
			<h3>Написать пользователю</h3>
			<form   method="POST">
				<textarea class="input" name="send_mes" style="width: 100%; height: 150px; resize: none;"></textarea>
				<button class="button" type="submit" style="width: 100%; height: 50px;">Отправить</button>
			</form>
		
		<?php
?>
		<?php
			if (isset($_POST['send_mes']) && $_POST['send_mes'] !="") {
				$sql = "INSERT INTO `messages` (`komu_user_id`, `ot_user_id`, `text`) VALUES 
				('" . $item['user_id'] . "', '" . $user_auth . "', '" . $_POST['send_mes'] . "')";
				if ( mysqli_query($connect, $sql) ) {
					header("location: ads_page.php?id=".$_GET['id']);
				} else {
					echo "Что то не так";
				}
				} else {}
		?>
	<?php
?>
   		</div>
	</div>
<?php
	include "../parts/footer.php";
?>

