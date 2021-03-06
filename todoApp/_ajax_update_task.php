<?php
require_once("config.php");
require_once("functions.php");

//DBに接続
$dbh = connectDB();

$sql = "UPDATE tasks set title= :title, modified=now() WHERE id= :id";
$stmt = $dbh->prepare($sql);

$stmt->execute(array(
	":title" => $_POST['title'],
	":id" => (int)$_POST['id']
));
