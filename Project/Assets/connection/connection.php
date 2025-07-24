<?php
$server="localhost";
$user="root";
$password="";
$db="db_basic";
$con=mysqli_connect($server,$user,$password,$db);
if(!$con){
     echo "Connection failed";
} 
// else{
//      echo "Connected";
// }
?>