<?php
require_once "connection.php";
if(!empty($_GET['userid'])&&(!empty($_GET['tripid'])))
{
    $sql="INSERT INTO client_register(client_id,trip_id) VALUES(:cid,:tid)";
    $stat=$con->prepare($sql);
    $stat->execute(array(
        ':cid'=>$_GET['userid'],
        ':tid'=>$_GET['tripid']
    )); 
    echo "trip registered successfully<br>";
}
else{
    echo "sorry you cant register a trip";
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["back"]))
{
    header("Location:user.php");
    exit();
}
?>
<form method="POST" action="register.php">
    Back To Main Page<input type="submit" Value="Back" name="back">
</form>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    margin-top: 20px;
    text-align: center;
}

input[type="submit"] {
    padding: 10px 20px;
    margin: 5px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>