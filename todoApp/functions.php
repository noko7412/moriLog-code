<?php

function connectDB()
{
	try{
		return new PDO(
			DSN,
			DB_USER,
			DB_PASSWORD,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
		);
	}
	catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
}


function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
