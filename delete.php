<?php
if(!empty($_GET['id']))
{
    session_start();
    $_SESSION['id']=$_GET['id'];
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["delete"]))
{
    require_once "connection.php";
    session_start();
    $sql="DELETE FROM clients WHERE user_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute();
    echo"User Deleted Successfully<br>";
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["back"]))
{
    header("Location:show.php");
    exit();
}
?>
<form method="POST" action="delete.php">
    Are You Sure To Delete This User<input type="submit" name="delete" value="Delete"><br>
    Back To Main Page<input type="submit" name="back" value="Back">

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
    margin: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

</style>