<?php
require_once "connection.php";
if(isset($_GET['id']))
{
    session_start();
    $_SESSION['id']=$_GET['id'];
}
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['uname']))
{
    if(!empty($_POST["name"])){
    session_start();
    $sql="UPDATE clients SET username=:uname WHERE user_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':uname'=>htmlspecialchars($_POST["name"])));
    echo "username changed";
    }else{
        echo"please enter name to make change<br>";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['uemail']))
{
    if(!empty($_POST["email"])){
    session_start();
    $sql="UPDATE clients SET email=:email WHERE user_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':email'=>htmlspecialchars($_POST["email"])));
    echo "email changed";
    }else{
        echo"please enter email to make change<br>";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['upass']))
{
    if(!empty($_POST["pass"])){
    session_start();
    $sql="UPDATE clients SET password=:pass WHERE user_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array('pass'=>htmlspecialchars($_POST["pass"])));
    echo "password changed";
    }else{
        echo"please enter password to make change<br>";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['unum']))
{
    if(!empty($_POST["phone"])){
    session_start();
    $sql="UPDATE clients SET phone_number=:phone WHERE user_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':phone'=>htmlspecialchars($_POST["phone"])));
    echo "number changed";
    }else{
        echo"please enter phone number to make change<br>";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['urole']))
{
    if(!empty($_POST["role"])&&($_POST["role"]=='Admin'||$_POST["role"]=='client')){
    session_start();
    $sql="UPDATE clients SET role=:urole WHERE user_id=".$_SESSION['id'];
    $stat=$con->prepare($sql);
    $stat->execute(array(':urole'=>htmlspecialchars($_POST["role"])));
    echo "Role changed";
    }else{
        echo"please enter correct role to make change<br>";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['back']))
{
    session_start();
    if($_SESSION['Role']=="Admin"){
        header("Location:show.php");
        exit();
    }else{
        header("Location:user.php");
        exit();
    }
}
if(isset($_SESSION['id'])){
$sql="SELECT * FROM clients WHERE user_id=:cid";
$stat=$con->prepare($sql);
$stat->execute(array(':cid'=>$_SESSION['id']));
$user=$stat->fetch(PDO::FETCH_ASSOC);
if(!empty($user))
{
    echo"<table border='1'>";
    foreach($user as $key=>$value)
    {
        echo"<tr><td>the $key is</td><td> $value</td><tr>";
    }    
    echo"</table>";
}
else{
    echo"error ";
}}
?>
<br>
<form method="POST" action="update.php">
    <input type="text" name="name"><input type="submit" value="Upadte Name" name="uname"><br>
    <input type="text" name="email"><input type="submit" value="Upadte Email" name="uemail"><br>
    <input type="text" name="pass"><input type="submit" value="Upadte Password" name="upass"><br>
    <input type="text" name="phone"><input type="submit" value="Upadte Phone Number" name="unum"><br>
    <?php if($_SESSION['Role']=="Admin"){
    echo'<input type="text" name="role"><input type="submit" value="Upadte Role" name="urole"><br>';
    }?>
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
    width: 600px;
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

form {
    margin-top: 20px;
}

input[type="text"] {
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
</style>