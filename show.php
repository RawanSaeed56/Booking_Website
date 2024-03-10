<?php
require_once "connection.php";
$sql="SELECT * FROM clients";
$stat=$con->prepare($sql);
$stat->execute();
$users=$stat->fetchAll(PDO::FETCH_ASSOC);
if(!empty($users))
{
    echo"<table border='1'>";
    foreach($users as $user)
    {
        echo"<tr>";
        foreach($user as $key=>$value)
        {
            echo"<td>the $key is $value</td>";
        }
        echo"<td><a href=update.php?id=".urldecode(htmlentities($user['user_id'])).">Update_User</a></td>";
        echo "<td><a href=delete.php?id=".$user['user_id']."> Delete</a></td>";
        echo"</tr>";
    }
    echo"</table>";
}
else{
    echo"There Is No Users To Show<br>";
}
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["back"]))
{
    header("Location:admin.php");
}
?>
<form method="POST" action="show.php">
<br><br>
    Back To Main Page<input type="submit" value=" Back " name="back"><br>
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
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

td a {
    color: blue;
    text-decoration: none;
}

td a:hover {
    text-decoration: underline;
}

form {
    margin-top: 20px;
}

input[type="submit"] {
    padding: 10px 20px;
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