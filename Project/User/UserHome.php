<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-HomePage</title>
</head>
<body>
    <h1>Welcome...
    <?php 
    if(isset($_SESSION['uname'])){
        echo $_SESSION['uname'];
    }
    else{
        echo "Guest";
    }
    ?></h1>
</body>
</html>