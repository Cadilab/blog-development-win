<?php
$dsn = 'mysql:dbname=bloog;host=localhost';
$user = 'root';
$password = '';
try 
{
    $connection = new PDO($dsn, $user, $password);
}
catch (PDOException $e) 
{
    echo 'Connection failed: ' . $e->getMessage();
}
?>