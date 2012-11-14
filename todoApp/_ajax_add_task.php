<?php
error_reporting(E_ALL);

require_once("config.php");
require_once("functions.php");

//DBに接続
$dbh = connectDB();

$sql = "SELECT max(seq) +1 FROM tasks WHERE type != 'deleted'";
$seq = $dbh->query($sql)->fetchColumn();


$sql = "INSERT INTO tasks(title, seq, created, modified) VALUES (:title, :seq, now(), now())";
$stmt = $dbh->prepare($sql);

$stmt->execute(array(
	":title" => $_POST['title'],
	":seq" => $seq
));

print $dbh->lastInsertId();
