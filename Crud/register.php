<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
     <?php
     require('db.php');
     if(isset($_REQUEST['username']))
     {
        $username=stripcslashes($_REQUEST['username']);
        $username=mysqli_real_escape_string($conn,$username);
        $email=stripcslashes($_REQUEST['email']);
        $email=mysqli_real_escape_string($conn,$email);
        $password=stripcslashes($_REQUEST['password']);
        $password=mysqli_real_escape_string($conn,$password);
        $trn_date=date("Y-M-D H:i:s");

        $query="INSERT INTO users (Username,Password,Email,trn_date) VALUES ('$username','".md5($password)."','$email','$trn_date')";
        $result=mysqli_query($conn,$query);

        if($result) 
        {
            echo "<div class='form'>
                  <h3>Registration Successfull. </h3><br>
                  Click Here to <a href='login.php'>LOGIN</a>
                 </div>";
        }
     }
     else{
     ?>
      <div class="form">
           <h1>Register</h1>
            <form action="" method="post" name="registration">
                <input type="text" name="username" placeholder="Username" required/>
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" name="submit" Value="Register"/>
            </form>
            <p>Already have an account <a class="btn" href="login.php">Login</a></p>
      </div>
     <?php } ?>
     </body>
     </html>