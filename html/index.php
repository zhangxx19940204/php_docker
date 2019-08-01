<?php 





phpinfo();

try
 {
    $pdo = new PDO("mysql:host=172.19.0.2; dbname=test", "root","123456");
    echo 'success';
 }

catch (customException $e)
 {
 //display custom message
    echo $e->errorMessage();
 }
?>

