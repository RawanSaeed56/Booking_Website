<?php
session_start();
if(!isset($_SESSION['User_Id']))
{
    $_SESSION['guest']=true;
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['showt']))
{
    header("Location:user_trip.php");
    exit();
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['atrip']))
{
    header("Location:show_trip.php");
    exit();
}

?>
<form action="user.php" method="POST">
    Click To See Avilable Trips<input type="submit" name="atrip" value="Show Avilable Trips"><br>
    Click To See Your Previous And Registered Trips<input type="submit" name="showt" value="Show My Trips"><br>
    Click To See And Update Your Information<a href="update.php?id=<?php echo htmlentities($_SESSION['User_Id']);?>">See And Update</a>
</form><br><br>
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

a {
    text-decoration: none;
    color: blue;
}

a:hover {
    text-decoration: underline;
}

</style>