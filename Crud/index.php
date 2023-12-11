<?php
require('db.php');
include('auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <a href="dashboard.php">Dashboard</a></p>
    <a href="logout.php">Logout</a>
    </header>
    <div class="msg">
        <p class="welcome">Welcome <?php echo $_SESSION['username']; ?>!</p>
        <p>This is a secure area.</p>
      
    </div>
</body>
</html>