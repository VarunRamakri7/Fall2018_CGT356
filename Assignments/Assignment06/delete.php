<?php
session_start();


include("includes/openDBConn.php");

$sql = "DELETE FROM Members WHERE UniqueID = 2";

//echo($sql);

$result = $conn->query($sql);

include("includes/closeDBConn.php");

header("Location:select.php");
?>