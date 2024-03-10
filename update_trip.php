<form method="POST" action="update_trip.php">
    <input type="text" name="from"><input type="submit" value="Update Trip Will Be From" name="ufrom"><br>
    <input type="text" name="to"><input type="submit" value="Update Trip Will Be To" name="uto"><br>
    <input type="text" name="fly"><input type="submit" value="Update Time Of Flying" name="ufly"><br>
    <input type="text" name="arrive"><input type="submit" value="Update Arrival Time" name="uarrive"><br>
    <input type="date" name="date"><input type="submit" value="Update Trip Date" name="udate"><br>
    Back To Main Page<input type="submit" value="Back" name="back"><br>
</form>
<?php
require_once "connection.php";
if(isset($_GET['id']))
{
    session_start();
    $_SESSION['id']=$_GET['id'];
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['ufrom']))
{
    if(!empty($_POST['from'])){
    session_start();
    $sql="UPDATE trips SET trip_from=:ufrom WHERE trip_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':ufrom'=>htmlspecialchars($_POST['from'])));
    echo"Trip From Updated Successfully<br>";
    }else{
        echo"Please Enter Value To Make Change";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['uto']))
{
    if(!empty($_POST['to'])){
    session_start();
    $sql="UPDATE trips SET trip_to=:uto WHERE trip_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':uto'=>htmlspecialchars($_POST['to'])));
    echo"Trip To Updated Successfully<br>";
    }else{
        echo"Please Enter Value To Make Change";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['ufly']))
{
    if(!empty($_POST['fly'])){
    session_start();
    $sql="UPDATE trips SET trip_flight_time_at=:ufly WHERE trip_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':ufly'=>htmlspecialchars($_POST['fly'])));
    echo"Trip Flight Time Updated Successfully<br>";
    }else{
        echo"Please Enter Value To Make Change";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['uarrive']))
{
    if(!empty($_POST['arrive'])){
    session_start();
    $sql="UPDATE trips SET trip_timeland_at=:uland WHERE trip_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':uland'=>htmlspecialchars($_POST['arrive'])));
    echo"Trip Arrival Time Updated Successfully<br>";
    }else{
        echo"Please Enter Value To Make Change";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['udate']))
{
    if(!empty($_POST['date'])){
    session_start();
    $sql="UPDATE trips SET trip_date=:udate WHERE trip_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':udate'=>htmlspecialchars($_POST['date'])));
    echo"Trip Date Updated Successfully<br>";
    }else{
        echo"Please Enter Value To Make Change";
    }
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["back"]))
{
    header("Location:show_trip.php");
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

input[type="text"],
input[type="date"] {
    width: calc(50% - 10px);
    padding: 10px;
    margin: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
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

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
</style>