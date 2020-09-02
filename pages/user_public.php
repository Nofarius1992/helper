<?php
// страница с публичной информацией о пользователе
$page = "user_public";
// главная страница сайта
include "../configs/db.php";
include "../configs/settings.php";
include "../parts/header.php";

?>
<div class="container">
	<h2 class="user__public_title">Пользователь</h2>
	<div class="wrapper__user_public">
		<?php 
			include "functions/get_user_public.php";
		?>

			<img class="user__public_img" src="../<?php echo $item['photo'] ?>">

			<div class="wrapper__user_flex">
				<h4><span class="span">Имя:</span> <?php echo $item['name']; ?></h4>

				<h4><span class="span">Фамилия:</span> <?php echo $item['surname']; ?></h4>

				<h4><span class="span">Телефон:</span> <?php echo $item['phone_num']; ?></h4>

				<h4><span class="span">Адрес:</span> <?php echo $item['adress_user']; ?></h4>
			
				<h4><span class="span">Конфессия:</span> <?php echo $item['denomination']; ?></h4>
		
				<h4><span class="span">Название церкви:</span> <?php echo $item['church_name']; ?></h4>
		
				<h4><span class="span">Адрес церкви:</span> <?php echo $item['church_adress']; ?></h4>
			
				<h4><span class="span">Номер пастора:</span> <?php echo $item['pastor_num']; ?></h4>
		
				<h4><span class="span">Почта:</span> <?php echo $item['email']; ?></h4>

			</div>
				</div>
</div>
<?php 
	include "../parts/footer.php";
 ?>



