<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_base = "test";

$link = mysql_connect($db_host,$db_user,$db_pass);

$title = $_POST["title"];
$text = $_POST["text"];
$status = $_POST["status"];
$time1 = date('d.m.Y H:i', strtotime("+5 hour"));
$dateStop2 = date('d.m.Y H:i', strtotime("+77 hour"));

$sql = mysql_query("UPDATE `requests` SET `title` = '{$title}',`status` = '{$status}',`text` = '{$text}',`dateEdit` = '{$time1}',`dateStop2` = '{$dateStop2}' WHERE `id`={$id}",$link);

if ($sql == true){
	print "<script>alert(\"Заявка успешно добавлена!\"); window.location = window.location.href = '/';</script>";
}else{
	print "<script>alert(\"Не удалось добавить заявку, что-то пошло не так!\"); window.location = 'page2.php?id=$id';</script>";
}