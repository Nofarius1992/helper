<?php
// Личный кабинет
$page = "privat";
include "../../configs/db.php";
// настройки, тут лежи проверка на куки, для вхда или выхода.
include "../../configs/settings.php";
include "../../parts/header.php";
?>


<section class="feedback">
	<div class="wrapperHelp">
		<div class="container">
			<h2>Помощь</h2>
			<p>При возникновении любых споров, конфликтных ситуаций, нарушений правил проекта - просьба в обязательном порядке сообщать администрацию. Мы находимся здесь не для галочки, наша задача осуществлять и регулировать деятельность проекта в рамках данных правил.</p>
		</div>
	</div>
</section>

<?php
	include "../../parts/footer.php";
?>