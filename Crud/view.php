<?php
require('db.php');
include('auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <a href="index.php">Home</a>
        <a href="insert.php">Insert New Records</a>
        <a href="logout.php">Logout</a>
    </header>
    <div class="table">
        <h2>View Records</h2>
        <table class="record-table" width="100%" cellpadding="25" cellspacing="2">
           <thead>
              <tr>
                <th><strong>S.NO</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Age</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
              </tr>
           </thead>
           <tbody>
            <?php
              $count=1;
              $query="SELECT * FROM new_record ORDER BY ID DESC";
              $result=mysqli_query($conn,$query);
              while($row=mysqli_fetch_assoc($result))
              { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Age']; ?></td>
                    <td><?php echo "<a class='edit' href='edit.php?ID=$row[ID]';>Edit</a>"; ?></td>
                    <td><?php echo "<a class='delete' href='delete.php?ID=$row[ID]';>Delete</a>"; ?></td>
                </tr>
              
            <?php $count++; } ?>
           </tbody>
        </table>
    </div>
</body>
</html>