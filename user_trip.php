<?php
session_start();
require_once "connection.php";
$sql="SELECT trip_id FROM client_register WHERE client_id=:cid";
$stat=$con->prepare($sql);
$stat->execute(array(':cid'=>$_SESSION['User_Id']));
$ids=$stat->fetchAll(PDO::FETCH_ASSOC);
if(!empty($ids))
{
    echo "<table border=1>";
    foreach($ids as $idd)
    {
        foreach($idd as $id){
        $sql="SELECT * FROM trips WHERE trip_id=:tid";
        $stat1=$con->prepare($sql);
        $stat1->execute(array(':tid'=>$id));
        $trips=$stat1->FetchAll(PDO::FETCH_ASSOC);
        if(!empty($trips))
        {
            foreach($trips as $trip)
            {
                echo "<tr>";
                foreach($trip as $key=>$value)
                {
                    if($key!='trip_id')
                    {
                        echo"<td>$key => $value</td>";
                    }
                }
                echo "<td><a href=remove.php?tid=".$trip['trip_id'].">Remove</a></td>";
                echo "</tr>";
            }
        }
        }
    }
    echo "</table>";
}
else{
    echo "You Dont Have A Registered Trips To Show<br>";
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['back']))
{
    if($_SESSION['Role']=="Admin"){
        header("Location:admin.php");
        exit();
    }else{
        header("Location:user.php");
        exit();
    }
}
?>
<form method="POST" action="user_trip.php">
    Back To Your Page<input type="submit" value="Back" name="back">
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