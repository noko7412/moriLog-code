<?php
require_once("config.php");
require_once("functions.php");

//DBに接続
$dbh = connectDB();

parse_str($_POST['task']);
//var_dump($task);

foreach($task as $key => $val){
	$sql = "UPDATE tasks set seq = :seq WHERE id= :id";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(
		":seq" => $key,
		":id" => $val
	));
}