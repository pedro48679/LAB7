<?php

$hostname = "localhost";
$db_name = "db_a22304431";
$db_user = "a22304431";
$db_passwd = "0fa12f";

// mostra uma mensagem de erro vinda do mysql
function showerror($db)
{
  die("Error " . mysqli_errno($db) . " : " . mysqli_error($db));
} 


// fecha a base de dados
function db_close($db){
       mysqli_close($db);
}

// faz uma conexão a uma base de dados

function dbconnect($hostname,$db_name,$db_user,$db_passwd){
	$db = @ mysqli_connect($hostname, $db_user, $db_passwd, $db_name);
	if(!$db) {
  		die("Connection failed: " . mysqli_connect_error());
	}
	return $db;
}


?>