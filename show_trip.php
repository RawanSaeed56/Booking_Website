<?php
require_once "connection.php";
$sql="SELECT * FROM trips";
$stat=$con->prepare($sql);
$stat->execute();
$trips=$stat->fetchAll(PDO::FETCH_ASSOC);
session_start();
if(!empty($trips))
{
    echo"<table border=1>";
    foreach($trips as $trip)
    {
        echo"<tr>";
        foreach($trip as $key =>$value)
        {
            echo"<td>The $key Is $value</td>";
        }
        if($_SESSION['Role']=='Admin')
        {
            echo"<td><a href=update_trip.php?id=".$trip["trip_id"].">Update Trip</a></td>";
            echo"<td><a href=delete_trip.php?id=".$trip['trip_id'].">Delete Trip</td>";
        }
        else if($_SESSION['Role']=='client')
        {
            echo"<td><a href=register.php?tripid=".$trip["trip_id"]."&userid=".$_SESSION['User_Id'].">Register</a></td>";
        }
        else if(!empty($_SESSION['gest']))
        {
            echo"<td><a href=login.php>You Must Login To Register A Trip</a></td>";
        }
        echo"</tr>";
    }
    echo"</table>";
}
else{
    echo"There Is No Trips To Show<br>";
}
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["back"]))
{
    if($_SESSION['Role']=='Admin'){
        header("Location:admin.php");
        exit();
    }
    elseif($_SESSION['Role']=='client')
    {
        header("Location:user.php");
        exit();
    }
}
?>
<form method="POST" action="show_trip.php">
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
    width: 80%;
    margin: 50px auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

a {
    text-decoration: none;
    color: blue;
}

a:hover {
    text-decoration: underline;
}

form {
    margin-top: 20px;
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

</style>