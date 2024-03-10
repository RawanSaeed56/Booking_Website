<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <h1>Welcome To Our Site</h1>
    Enter Your Name<input type="text" name="name" required><br>
    Enter Your Password<input type="password" name="pass" required><br>
   <center>
       <input type="submit" value="Login" name="login"><br> OR <br>  <input type="submit" value="Sign_Up" name="signup">
    </center>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['login']))
{
    require_once 'connection.php';
    $name=htmlspecialchars($_POST['name']);
    $name=filter_var($name,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
    $pass=htmlspecialchars($_POST['pass']);
    $hashpass=md5($pass);
    if(!empty($name)&&!empty($hashpass))
    {
        $sql="SELECT * FROM clients WHERE username=:cname AND password=:pass";
        $stat=$con->prepare($sql);
        $stat->execute(array(
            ':cname'=>$name,
            ":pass"=>$hashpass
        ));
        $user=$stat->fetch(PDO::FETCH_ASSOC);
        if(!empty($user))
        {
            session_start();
            $_SESSION["User_Id"]=$user['user_id'];
            $_SESSION["username"]=$user["username"];
            //$_SESSION["password"]=$user["password"]; ملهاش لازمة
            $_SESSION["phone number"]=$user["phone_number"];
            $_SESSION["Email"]=$user["email"];
            $_SESSION["Role"]=$user["role"];

            if($user['role']=="client")
            {
                header("Location:user.php");
                exit();
            }
            else if($user['role']=="Admin")
            {
                header("Location:admin.php");
                exit();
            } 
        }
        else{
            echo "User Not Found<br>";
        }
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST" &&isset($_POST['signup']))
{
    header("Location:sign_up.php");
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
    width: 300px;
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
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

input[type="submit"] {
    width:200px;
    background-color: #4caf50;
    color: white;
    cursor: pointer;
    text-align: center;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.or-text {
    text-align: center;
    margin: 10px 0;
}

.or-text span {
    color: #999;
    margin: 0 5px;
}

.or-text hr {
    border: none;
    border-top: 1px solid #ccc;
    margin-top: 5px;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
</style>