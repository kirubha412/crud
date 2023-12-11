<?php
require('db.php');
// $id=$_REQUEST['ID'];
$query="DELETE FROM new_record WHERE ID=$_GET[ID]";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
header("Location: view.php");
?>