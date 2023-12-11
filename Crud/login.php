<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    require('db.php');
    session_start();
    if(isset($_POST['username'])) {
        $username=stripcslashes($_REQUEST['username']);
        $username=mysqli_real_escape_string($conn,$username);
        $password=stripcslashes($_REQUEST['password']);
        $password=mysqli_real_escape_string($conn,$password);
    
        $query="SELECT * FROM users WHERE Username='$username' AND Password='".md5($password)."'";
        echo $query; 
        $result=mysqli_query($conn,$query) or die(mysqli_error());
        $rows=mysqli_num_rows($result);
        print_r ($rows);
        // die;

        if($rows==1) 
        {
            $_SESSION['username']=$username;
            header("Location: index.php");
        }
        else
        {
            echo "<div class='form'>
                   <h3>Username/Password is incorrect. </h3><br>
                   Click Here to <a class='btn' href='login.php'>LOGIN</a>
                </div>";
        }

    }
    else
    {
        ?>
        <div class="form">
            <h1>LOGIN</h1>
            <form action="" method="post" name="login">
                <input type="text" name="username" placeholder="Username" required/><br>
                <input type="password" name="password" placeholder="Password" required/><br>
                <input type="submit" name="submit" Value="Login"/>
            </form>
            <p>Not Registered Yet? <a class="btn" href="register.php">Register Here</a></p>
        </div>
    <?php } ?>
