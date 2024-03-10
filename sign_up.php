<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<h1>Welocome To Our Site</h1>
    Enter Your Name<input type="text" name="name" required><br>
    Enter Your Password<input type="password" name="pass" required><br>
    Enter Your Phone Number<input type="number" name="phone" required><br>
    Enter Your Email<input type="email" name="email" required><br>
    <center>

        <input type="submit" value="Sign_Up" name="signup">
    </center>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['signup']))
{
    $name=htmlspecialchars($_POST['name']);
    $name=filter_var($name,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
    $pass=filter_var($_POST['pass'],FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_NO_ENCODE_QUOTES);
    $phone=filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $hashedPassword =md5($pass); //search
    $pattern = '/^\d{11}$/';
    $flag = filter_var($phone, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $pattern)));
    
    echo $phone."jkhbn".$pass;
    if($flag && filter_var($email,FILTER_VALIDATE_EMAIL)&&!empty($name)&&!empty($hashedPassword))
    {
        require_once 'connection.php';
        $sql="INSERT INTO clients(username,password,phone_number,email) VALUES(:name,:pass,:phone,:email)";
        $stat=$con->prepare($sql);
        $stat->execute(array(
            ':name'=>$name,
            ':pass'=>$hashedPassword,
            ':phone'=>$phone,
            ':email'=>$email
        ));
        header("Location:login.php");
    }
    else{
        echo "Please Enter Correct Data";
    }
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

h1 {
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
}

input[type="text"],
input[type="password"],
input[type="number"],
input[type="email"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    cursor: pointer;
    width:200px;
    
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