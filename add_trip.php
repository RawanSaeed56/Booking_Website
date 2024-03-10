<form method="POST" action="add_trip.php">
    The Trip Will Be From<input type="text" name="from" required><br>
    The Trip Will Be To<input type="text" name="to" required><br>
    Time Of Flight<input type="text" name="fly" required><br>
    Arrival Time<input type="text" name="arrive" required><br>
    Enter The Date Of Trip<input type="date" name="date" required><br>
    Add Trip<input type="submit" value="Add It" name="add"><br>
</form>
<form method="POST" action="add_trip.php">
    Back To Main Page<input type="submit" value="Back" name="back"><br>
</from>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
{
    require_once "connection.php";
    $from=htmlspecialchars($_POST['from']);
    $to=htmlspecialchars($_POST['to']);
    $time_fly=htmlspecialchars($_POST['fly']);
    $time_land=htmlspecialchars($_POST['arrive']);
    $date=$_POST['date'];
    if(!empty($from)&&!empty($to)&&!empty($time_fly)&&!empty($time_land)&&!empty($date))
    {
        $sql="INSERT INTO trips(trip_from,trip_to,trip_flight_time_at,trip_timeland_at,trip_date) VALUES (:tfrom,:tto,:tfly,:tland,:tdate)";
        $stat=$con->prepare($sql);
        $stat->execute(array(
            ':tfrom'=>$from,
            ':tto'=>$to,
            'tfly'=>$time_fly,
            ':tland'=>$time_land,
            'tdate'=>$date
        ));
        echo"trip added successfully";
    }
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["back"]))
{
    header("Location:admin.php");
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
}

input[type="text"],
input[type="date"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>