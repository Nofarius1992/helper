<?php
// Страница для добавления объявлений.
$page = "newad";
include "../configs/db.php";
include "../configs/settings.php";

	include "../parts/header.php";
	?>
	<div class="container">
		<div class="wrapper__regauth">
			<div class="regauth">
				<form action="functions/upload.php" method="post" enctype="multipart/form-data">

					<input class="input" type="text" name="city" placeholder="Город" autocomplete="off">
					<input class="input" type="text" name="adress_kv" placeholder="Адрес квартиры" autocomplete="off">
					<textarea class="input textarea" type="text" name="description" placeholder="Описание" autocomplete="off"></textarea>
					<textarea class="input textarea" type="text" name="infrast" placeholder="Инфраструктура" autocomplete="off"></textarea>
					<textarea class="input textarea" type="text" name="attractions" placeholder="Достопримечательности" autocomplete="off"></textarea>
					<input class="input" type="text" name="terms" placeholder="Сроки" autocomplete="off">
					<input class="input" type="text" name="status" placeholder="Статус" autocomplete="off">
					<input class="input" type="hidden" name="MAX_FILE_SIZE" value="5000000" />
					<input class="inputfile" id="file" type="file" name="uploadfile"/>
					
					<label id="lablefile" for="file">Добавить фотографию</label>
					<!-- смена названия кнопки -->
					<script type="text/javascript"> 
						
						var fileget = document.getElementById("file");
						var lablefile = document.querySelector("#lablefile");

						fileget.onchange = function(){
			
							lablefile.innerText = "Добавлено: " + fileget.files[0].name;
							
						} 
						
					 </script>
					<p class="info">Все поля должны быть заполнены!</p>

					<button class="button" type="submit">Загрузить</button>

				</form>
				
			</div>
		</div> <!-- /.wrapper-regaut -->	
	</div>
<?php
	include "../parts/footer.php";
?>
