<?php

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_base = "test";

	$link = mysql_connect($db_host,$db_user,$db_pass);

	mysql_select_db($db_base, $link) or die('Ошибка : '. mysqli_error());

	$id = trim($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Список заявок</title>
	<style type="text/css">
		table th {
			border-bottom: 1px solid black; 
			padding: 10px;
		}
		table td {
			padding: 10px;
		}
		table .zz:hover {
			background: #B0B6BB;
		}
		.hh,
		.hh1 {
			font-weight: bold;
			padding-bottom: 5px;
		}
		.col {
			padding-bottom: 20px;
		}
		input, select {
			padding: 5px; 
		}
		textarea {
			width: 200px;
			height: 80px;
		}
		img {
			width: 25%;
		}
		.button-submit {
			margin-top: 40px;
		}
	</style>
	<meta charset="utf-8" />
    <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
</head>
<body>
	<main>
		<div class="nav" style="margin: 40px;">
			<li style="margin-bottom: 10px;"><a href="/">Список заявок</a></li>
			<li><a href="page1.php">Форма подачи заявки</a></li>		
		</div>
		<hr>
		<div class="main" style="margin: 20px 0 0 40px;">
			<div id="items" >
				<?php
					$result1 = mysql_query("SELECT * FROM requests WHERE id='$id'", $link);

					if(mysql_num_rows($result1) > 0) {

						$item = mysql_fetch_array($result1);				

						do {

							switch ($item['status']) {
							    case 1:
							        $item['status'] = 'новая';
							        break;
							    case 2:
							        $item['status'] = 'в работе';
							        break;
							    case 3:
							        $item['status'] = 'завершена';
							        break;
							    case 4:
							        $item['status'] = 'отменена';
							        break;
							}

							$time = date('d.m.Y H:i', strtotime("+5 hour"));

							if ($time > $item['dateStop1']) {
								$ii = "";
							} else {
								$ii = "style='color:red;'";
							}

							// if ($item['status'] == 'новая') {
							// 	$ll = "selected";
							// } else {
							// 	$ll = "";
							// }
							// if ($item['status'] == 'в работе') {
							// 	$ll = "selected";
							// } else {
							// 	$ll = "";
							// }
							// if ($item['status'] == 'завершена') {
							// 	$ll = "selected";
							// } else {
							// 	$ll = "";
							// }
							// if ($item['status'] == 'отменена') {
							// 	$ll = "selected";
							// } else {
							// 	$ll = "";
							// }

							echo '
							<form class="form" id="request" action="zapr.php" method="post">
								<div class="zz">
									<div class="col">
										<div class="hh">Дата создания:</div>
										<div>'.$item['dateStart'].'</div>
									</div>
									<div class="col">
										<div class="hh">Дата редактирования:</div>
										<div>'.$item['dateEdit'].'</div>
									</div>
									<div class="col">
										<div class="hh">Статус заявки:</div>
										<select name="status">
											<option '.$ii.' value="1">новая</option>
											<option '.$ii.' value="2">в работе</option>
											<option '.$ii.' value="3">завершена</option>
											<option '.$ii.' value="4">отменена</option>
										</select>
									</div>
									<div class="col">
										<div class="hh">Заголовок:</div>
										<input type="text" name="title" value="'.$item['title'].'">
									</div>
									<div class="col">
										<div class="hh">Основной текст:</div>
										<textarea type="text" name="text">'.$item['text'].'</textarea>
									</div>
									<div class="imgs">
										<div class="hh1">Изображения:</div>
										<div class="images">
											<img src="./img/'.$item['img1'].'">
											<img src="./img/'.$item['img2'].'">
											<img src="./img/'.$item['img3'].'">
										</div>
									</div>
								</div>
								<input type="submit" value="сохранить" class="button-submit">
							</form>';

						} while ($item = mysql_fetch_array($result1));

					} else {
						echo 'Список заявок пуст';
					}
				?>
			</div>

		</div>		

	</main>
</body>
</html>