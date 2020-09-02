<!-- это часть формы, которую использует аякс -->
<ul class="chat_info">
<?php
        if(isset($_GET['id']) || isset($curr_user)){
          
          $user_curr = null;

          if (isset($_GET['id'])) {
          	$user_curr = $_GET['id'];
          } else {
          	$user_curr = $curr_user;
          }
          // подклчение к таблице сообщений
          $sql_2 = "SELECT * FROM messages " . 
          " WHERE (komu_user_id = " . $user_curr . " AND ot_user_id = '" . $user_auth . "')" . " OR (komu_user_id = '" . $user_auth . "' AND ot_user_id = " . $user_curr . ")" ;
	          // выполнить запрос бд
	          $result_2 = mysqli_query($connect, $sql_2);
	          // получить кол результатов vcx 
	          $col_mess = mysqli_num_rows($result_2);

	          $i = 0;
	          // выбор пользователя с id $_GET["user"]
	          $sqln = "SELECT name FROM register WHERE id =" . $user_curr;
	          $resultn = mysqli_query($connect, $sqln);
	          $usrnm = mysqli_fetch_assoc($resultn);
	          // вывод имени пользователя, с оторым сейчас открыт чат 
	          ?>
	          <!-- выводит имя пользоваеля, которым открыт чат -->
	            <div id="name-user">
	            <h1><?php echo "<h3>" . $usrnm["name"] .  "</h3>" ?></h1>
	            </div>
	          <?php
	          	// вывод сообщений
	            while ($i < $col_mess ) {
	              $messag = mysqli_fetch_assoc($result_2);
	                ?>
	                <li class="message__list_li">
		                <?php
		                	// Вывод имени пользователя
							$sql = "SELECT * FROM register WHERE id ="   .  $messag["ot_user_id"];
							// Выполнение запроса
							$username = mysqli_query($connect, $sql);
							// запись в переменную массива с именами
							$username = mysqli_fetch_assoc($username);

		                ?>
		                <!-- фото пользоваеля -->
		                <div class="avatar">
		                  <img src="../<?php echo $username['photo']; ?>">
		                </div>
		                <!-- имя пользователя -->
		                <h4 class="message__list_name"> <?php echo $username["name"] ?>  </h4>
		                 <!-- время -->
		                <div class="time"><?php echo $messag["time"] ?> </div>
		                <!-- текст сообщения -->
		                <p class="tex__message"> <?php echo $messag["text"] ?>  </p>
		               
	                </li>

	                <?php
	              $i = $i + 1;
            }
        }
?>
</ul>
