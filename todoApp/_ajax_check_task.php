<?php
require_once("config.php");
require_once("functions.php");

//DBに接続
$dbh = connectDB();

$sql = "UPDATE tasks set type= if(type='done', 'notyet', 'done'), modified=now() WHERE id= :id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(":id" => (int)$_POST['id']));

