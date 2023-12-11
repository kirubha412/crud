<?php
require('db.php');
include('auth.php');
$status="";
if(isset($_POST['new']) && $_POST['new']==1) 
{
    $trn_date=date("Y-M-D H:i:s");
    $name=$_REQUEST['name'];
    $age=$_REQUEST['age'];
    $submittedby=$_SESSION["username"];

    $ins_query="INSERT INTO new_record (trn_date,Name,Age,SubmittedBy) VALUES ('$trn_date','$name','$age','$submittedby')";
    mysqli_query($conn,$ins_query) or die(mysqli_error());
    $status="New Record Inserted Successfully.<br><br><a href='view.php'>View Inserted Records</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
       <a href="dashboard.php">Dashboard</a> 
       <a href="view.php">View Inserted Records</a>
       <a href="logout.php">Logout</a>
    </header>
    <div class="form">
        <div>
            <h1>Insert New Records</h1>
            <form action="" name="form" method="post">
                <input type="hidden" name="new" value="1"/>
                <p><input type="text" name="name" placeholder="Enter Name" required/></p>
                <p><input type="text" name="age" placeholder="Enter age" required/></p>
                <input type="submit" name="submit" value="Submit"/>
            </form>
        </div>
    </div>
</body>
</html>