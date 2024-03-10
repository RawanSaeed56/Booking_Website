<?php
$user="root";
$pass="";
$servername="localhost";
$dbname="airport";
try{
    $con=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
}catch(PDOException $e)
{
    echo "Error In Connection: ".$e->getMessage();
}

?>