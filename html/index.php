<?php 


try
 {
    $pdo = new PDO("mysql:host=172.23.0.3; dbname=test", "root","123456");
    echo 'success';
 }

catch (customException $e)
 {
 //display custom message
    echo $e->errorMessage();
 }


phpinfo();


?>

