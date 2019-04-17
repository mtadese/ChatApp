<?php 
#declare variables for the database table name
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "chat";

#connection string using mysqli
$con = new mysqli($host,$user,$pass,$db_name);

#format the date field to display only time
function formatDate($date) {
    return date('g:i a', strtotime($date));
}


?>