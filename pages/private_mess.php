<?php
// Личный кабинет
$page = "privat";
include "../configs/db.php";
// настройки, тут лежи проверка на куки, для вхда или выхода.
include "../configs/settings.php";
include "../parts/header.php";

if (isset($user_auth) ){
	$sql = "SELECT * FROM register WHERE id !=".$user_auth;
	
} else {
	$sql = "SELECT * FROM register";
}

$result = mysqli_query($connect, $sql);
$col_polsovateli = mysqli_num_rows($result);

?>
<!-- нчао блока чата -->
<div class="container">
	<div class="cont">
		<!-- эти классы можно менять -->
		<div class="cont_left">
			<ul>
				<?php
				// вывод списка пользователей
					$i = 0;
					while($i < $col_polsovateli) {
						$names = mysqli_fetch_assoc($result);
						//запрос в БД на наличие сообщений от/кому пользователя из списка пользователей
						$sql_messages = "SELECT * FROM messages WHERE ot_user_id = '" . $names["id"] . "' AND komu_user_id ='" . $user_auth . "' OR ot_user_id = '" . $user_auth . "' AND komu_user_id = '" . $names["id"] . "' ";
						$result_messages = mysqli_query( $connect, $sql_messages );
						$col_messages = mysqli_fetch_assoc ($result_messages );
						//Если есть сообщения для/от проверяемого пользователя віводим его в списке сообщений
						if ( $col_messages > 0 ) {
							?>
							<li>
								<a style="color: black;" class="name__user_message" href="private_mess.php?id=<?php echo $names["id"]; ?>"><?php echo $names["name"]; ?></a>
							</li>
						<?php
						}
						$i = $i + 1;
					}
				?>
			</ul>

		</div>
		<div class="cont_right">
			<!-- тут какие то стили и все такое, надо удалить, главное сохранить структуру. И этот тоже можо трогать-->
			<div id="block">
				<!-- заменяемый аяксом блок, id надо оставить таким(но этот нельзя(chatAjax)) -->
				<div id="chatAjax" style="height: 85%; overflow-y: scroll; word-wrap: break-word" >
			      <?php
			      	include "functions/messagelist.php";
			      ?>
				</div>

				<!-- форма отпраки собщения (используется аякс) тут тоже не нужо менять id формы -->
				<form method="POST" action="http://Project.local/pages/functions/messages.php" id="addMessForm">
					<?php
						if (isset($_GET['id'])) {
							$get_id = $_GET['id'];
					?>
					<input type="hidden" name="komu_user_id" value="<?php echo $get_id; ?>">
					<input type="hidden" name="ot_user_id" value="<?php echo $user_auth ?>">

					<textarea class="input pravka_text" style="height: 15%; width: 80%; resize: none;" name="message"></textarea>

					<button class="button pravka_button" type="submit" name="sub" style="width: 15%;">Отправить</button>
						<?php
							}
						?>
				</form>
			</div>

		</div>

	</div>
</div>

<?php
	include "../parts/footer.php";
?>