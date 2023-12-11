<?php
require('db.php');
include('auth.php');
// $id=$_REQUEST['id'];
$query="SELECT * FROM new_record WHERE ID='$_GET[ID]'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($result); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <a href="dashboard.php">Dashboard</a>
    <a href="view.php">View Inserted Records</a>
    <a href="logout.php">Logout</a>
  </header>
<div class="msg form">
        <div>
            <h1>Update Record</h1>
            <?php
              $status="";
              if(isset($_POST['new']) && $_POST['new']==1)
             {
                // $id=$_REQUEST['id'];
                $trn_date=date("Y-M-D H:i:s");
                $name=$_REQUEST['name'];
                $age=$_REQUEST['age'];
                $submittedby=$_SESSION["username"];

                $query="UPDATE new_record SET trn_date='$trn_date',Name='$name',Age='$age',SubmittedBy='$submittedby' WHERE ID='$_GET[ID]'";
                mysqli_query($conn,$query) or die(mysqli_error());
                $status="Record Updated Successfully.<br><br><a class='view' href='view.php'>View Updated Record</a>";
                echo "<p>$status</p>";

            //     if ($result) {
            //       while ($row=mysqli_fetch_assoc($result)) {
            //           $id = $row['id'];
            //           $name = $row['name'];
            //           $age = $row['age'];
            //           // $email = $row['email'];
            //       }
            //  }    
            }
             else 
             { ?>

               <div>
               <form action="" name="form" method="post">
                    <input type="hidden" name="new" value="1"/>
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>"/>
                    <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['Name']; ?>"/></p>
                    <p><input type="text" name="age" placeholder="Enter age" required value="<?php echo $row['Age'] ?>"/></p>
                    <input type="submit" name="submit" value="Update"/>
                </form>
               <?php } ?>
             </div>
        </div>
</body>
</html>





