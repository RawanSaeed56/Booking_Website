<form method="POST" action="admin.php">
    <h1>Welcome To Admin Page</h1>
    Show All Clients And Admins<input type="submit" value="Show Users" name="all"><br> 
    Show All Trips<input type="submit" name="atrip" value="Show Trips"><br>
    Add Trips<input type="submit" value="Add a Trip" name="add">

</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
session_start();
if(!empty($_SESSION['User_Id'])&&$_SESSION['Role']=="Admin")
{
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["all"]))
    {
        header("Location:show.php");
        exit();
    }
    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
    {
        header("Location:add_trip.php");
        exit();
    }
    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['atrip']))
    {
        header("Location:show_trip.php");
        exit();
    }
}
else{
    echo"You Are Not Supported To See This<br>";
    header("Location:user.php");
    exit();
}}
?>
<form action="logout.php" method="POST">
    <input type="submit" value="logout">
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

h1 {
    text-align: center;
    color: #333;
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