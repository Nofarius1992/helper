<?php

?>
<!-- тут какие то стили и все такое, надо удалить, главное сохранить структуру. -->
<div id="block" style="height: 100%">

	<div id="chatAjax" style="height: 85%; overflow: scroll;" >

      <?php
      	include "functions/messagelist.php";
      ?>
	</div>

	<!-- форма отпраки собщения -->
	<form method="POST" action="http://Project/pages/functions/messages.php" id="addMessForm">

		<input type="hidden" name="komu_user_id" value="<?php echo $messag["komu_user_id"]; ?>">
		<input type="hidden" name="ot_user_id" value="<?php echo $messag["ot_user_id"]; ?>">

		<textarea style="height: 15%; width: 80%; resize: none;" name="message"></textarea>

		<button type="submit" name="sub" style="width: 15%;">Отправить</button>
	</form>
</div>