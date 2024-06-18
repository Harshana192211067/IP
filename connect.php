<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
$servername="localhost";
$username="root";
$password="";
$database="exam_db";

$conn = new mysqli($servername,$username,$password,$database);
if ($conn->connect_error)
{
die("FAILEd" .$conn->connect_error);

}
else{
    echo("SUCCESS");
}}

?>