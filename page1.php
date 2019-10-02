<?php 

// var_dump($_POST); die;

$title = $_POST["title"];
$text = $_POST["text"];
$time = date('d.m.Y H:i', strtotime("+5 hour"));
$dateStop1 = date('d.m.Y H:i', strtotime("+6 hour"));
$status = 1;

$img1 = $_POST["img1"];
$img2 = $_POST["img2"];
$img3 = $_POST["img3"];

if (isset($title) && isset($text)) {

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_base = "test";
	$db_table = "requests";

	$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_base);

	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $result = $mysqli->query("INSERT INTO ".$db_table." (title,text,dateStart,dateStop1,status,img1,img2,img3) VALUES ('$title','$text','$time','$dateStop1','$status','$img1','$img2','$img3')");
    
    if ($result == true){
    	print "<script>alert(\"Заявка успешно добавлена!\"); window.location = window.location.href = '/';</script>";
    }else{
    	print "<script>alert(\"Не удалось добавить заявку, что-то пошло не так!\"); window.location = 'page1.php';</script>";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Форма подачи заявки</title>
	<style type="text/css">
		#title {
			width: 200px;
		}
		#text {
			width: 200px;
			height: 80px;
		}
	</style>
</head>
<body>
	<main>
		<div class="nav" style="margin: 40px;">
			<li style="margin-bottom: 10px;"><a href="/">Список заявок</a></li>
			<li><a href="page1.php">Форма подачи заявки</a></li>		
		</div>
		<hr>
		<div class="main" style="margin: 20px 0 0 40px;">
			<form class="form" id="requests" action="" method="post">
				<p>
					<input type="text" name="title" class="feedback-input" required="" placeholder="Заголовок" id="title" autocomplete="off" value=''>
				</p>
				<p>Изображение 1: 
					<input type="file" name="img1" accept="image/*,image/jpeg">
				</p>
				<p>Изображение 2: 
					<input type="file" name="img2" accept="image/*,image/jpeg">
				</p>
				<p>Изображение 3: 
					<input type="file" name="img3" accept="image/*,image/jpeg">
				</p>				
				<p>
					<textarea type="text" name="text" id="text" required="" placeholder="Основной текст" class="feedback-input"></textarea>
				</p>
				<p style="display: none;">
					<input type="text" name="status" value="1">
				</p>
				<input type="submit" value="сохранить" class="button-submit">
			</form>
		</div>

	</main>
</body>
</html>