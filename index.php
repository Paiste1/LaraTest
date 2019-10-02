<?php

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_base = "test";

	$link = mysql_connect($db_host,$db_user,$db_pass);

	mysql_select_db($db_base, $link) or die('Ошибка : '. mysqli_error());

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
	</style>
	<meta charset="utf-8" />
    <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
</head>
	<!-- <script>  
		function mode() {
		    $.ajax({
		        url: 'index.php #items',
		        success: function(data) {
		            $('#items').html(data);
		        }
		    });
		};

		setInterval(mode, 10000);
    </script> -->
<body>
	<main>
		<div class="nav" style="margin: 40px;">
			<li style="margin-bottom: 10px;"><a href="/">Список заявок</a></li>
			<li><a href="page1.php">Форма подачи заявки</a></li>		
		</div>
		<hr>
		<div class="main" style="margin-top: 20px;">
			<table style="margin: 20px 0 0 40px;">
				<tr>
					<th>№</th>
					<th>Дата создания</th>
					<th>Статус</th>
					<th>Заголовок</th>
					<th>Изображение 1</th>
					<th>Изображение 2</th>
					<th>Изображение 3</th>
				</tr>

				<div id="items">
					<?php
						$result = mysql_query("SELECT * FROM `requests`", $link);

						if(mysql_num_rows($result) > 0) {

							$item = mysql_fetch_array($result);				

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

								echo '
									    <tr class="zz">
									    <td><a href="page2.php?id='.$item['id'].'">'.$item['id'].'</a></td>
										  <td>'.$item['dateStart'].'</td>
										  <td '.$ii.'>'.$item['status'].'</td>
										  <td>'.$item['title'].'</td>
										  <td>'.$item['img1'].'</td>
										  <td>'.$item['img2'].'</td>
										  <td>'.$item['img3'].'</td>
									    </tr>
									  ';

							} while ($item = mysql_fetch_array($result));

						} else {
							echo 'Список заявок пуст';
						}
					?>
				</div>


			</table>
		</div>		

	</main>
</body>
</html>