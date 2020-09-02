<?php
$page = "privat";
// Страница редактирования объявления
include "../configs/db.php";
include "../configs/settings.php";
include "../parts/header.php";
if (isset($_GET['id'])) {
	

$sql = "SELECT * FROM ads WHERE id LIKE '" . $_GET["id"] . "'";
$result = mysqli_query($connect, $sql);
$item = mysqli_fetch_assoc($result);

?>

		<div class="container">
			<div class="wrapper__edit_ad">
				<div class="" style="position: relative; padding-top: 80px;">
				<h4 class="edit_title">Редактирование объявления</h4>
				</div>

				<form action="functions/upload.php" method="post" enctype="multipart/form-data">
					
					<input type="hidden" name="edit" value="">
					<div >
						<div >
							<div >
								<input name = "id" type="hidden" value = "<?php echo $item["id"]; ?>" >
							</div>
						</div>
					</div>
					<div >
						<div >
							<div >
								<input name = "user_id" type="hidden" value = "<?php echo $item["user_id"]; ?>" >
							</div>
						</div>
					</div>
				
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Город:</label>
								<input class="input" name = "city" type="text" value = "<?php echo $item["city"]; ?>"></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Адрес:</label>
								<input class="input" name = "adress_kv" type="text" value = "<?php echo $item["adress_kv"]; ?>"></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Описание:</label>
								<input class="input" name = "description" type="text" value = "<?php echo $item["description"]; ?>"></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Инфраструктура:</label>
								<input class="input" name = "infrast" type="text" value = "<?php echo $item["infrast"]; ?>"></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Достопремичания:</label>
								<input class="input" name = "attractions" type="text" value = "<?php echo $item["attractions"]; ?>"></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Условия:</label>
								<input class="input" name = "terms" type="text" value = "<?php echo $item["terms"]; ?>"></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div class="wrapper__flex_edit">
								<label>Статус:</label>
								<input class="input" name = "status" type="text" value = "<?php echo $item["status"]; ?>" ></input>
							</div>
						</div>
					</div>
					<div >
						<div >
							<div >
								<label id="lablefile" for="file">Фото</label>
								
								
								<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
								
								<input class="inputfile" id="file" type="file" name="uploadfile"/>
								<!-- смена названия кнопки -->
								<script type="text/javascript"> 
						
									var fileget = document.getElementById("file");
									var lablefile = document.querySelector("#lablefile");

									fileget.onchange = function(){
						
										lablefile.innerText = "Добавлено: " + fileget.files[0].name;
										
									} 
									
								 </script>
							</div>
						</div>
					</div>
					<button class="button" name = "submit" type="submit" value = "1">Редактировать</button>
					<div class="clearfix"></div>
				</form>
				<a class="delete_ad" href="functions/delete_ad.php?id=<?php echo $item["id"]; ?>">Удалить объявление</a>
			</div>
        </div>
<?php
}
	include "../parts/footer.php";
?>