<form method="POST" action="remove.php">
    Are You Sure To Delete THis Trip<input type="submit" Value="Delete It" name="delete"><br>
    Back To Main Page<input type="submit" Value="Back" name="back">
</form>
<?php
if(isset($_GET['tid']))
{
    session_start();
    $_SESSION['tid']=$_GET['tid'];
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["delete"]))
{
    require_once "connection.php";
    session_start();
    $sql="DELETE FROM client_register WHERE trip_id=".$_SESSION['tid'];
    $stat=$con->prepare($sql);
    $stat->execute();
    echo"Trip Deleted Successfully<br>";
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["back"]))
{
    header("Location:user_trip.php");
    exit();
}
?>
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