<?php



$db_host = "localhost";

$db_username = "root";

$db_password = "";

$db_name = "aceup";

$conn = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_name");

if(!$conn){
     echo "<p> Couldn't connect to the $db_name". "database: " .mysqli_connect_error() . "<\p>\n";
}

