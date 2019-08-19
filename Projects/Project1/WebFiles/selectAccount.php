<?php 
session_start();
echo("<?xml version=\"1.0\" encoding =\"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8" />
    <title>Account Info - Select Page </title>
</head>

<body>
    <h1 align="center">Account Info - Select Page</h1>
    <?php 
        $servername="localhost";
        $username="ramakri7";
        $password="19fire98";
        $dbname="Project1";

        include("includes/openDBConn.php"); 

        $sql="SELECT DISTINCT * FROM projectlogin WHERE username='".$_SESSION["login_user"]."'";
        $result= $conn->query($sql);
    ?>

    <table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px;" title="Project 1 user Account Information">

        <thead>
            <tr>
                <th colspan="5" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline;">Project 1 User Information</th>
            </tr>
            <tr>
                <th style="background-color:#b1946c; font-weight:bold;">UniqueID</th>
                <th style="background-color:#b1946c; font-weight:bold;">Firstname</th>
                <th style="background-color:#b1946c; font-weight:bold;">Lastname</th>
                <th style="background-color:#b1946c; font-weight:bold;">Username</th>
                <th style="background-color:#b1946c; font-weight:bold;">Password</th>
            </tr>

        </thead>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align:center; font-style:italic">Information was pulled from the Project 1 Database</td>
            </tr>
        </tfoot>
        <tbody>
            <?php
                if($result->num_rows > 0)
                {
                    while($row= $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <td style="border-right:1px solid #000000;">
                                <a href="updateAccount.php?id=<?php echo(trim($row["uniqueid"])); ?>">edit</a> | <a href="deleteAccount.php?id=<?php echo(trim($row["uniqueid"])); ?>">delete</a>
                            </td>
                            <td style="border-right:1px solid #000000;"><?php echo(trim($row["firstname"])); ?></td>
                            <td style="border-right:1px solid #000000;"><?php echo(trim($row["lastname"])); ?></td>
                            <td style="border-right:1px solid #000000;"><?php echo(trim($row["username"])); ?></td>
                            <td style="border-right:1px solid #000000;"><?php echo(trim($row["password"])); ?></td>
                        </tr>
                        <?php 
                    }
                }
                 else
                {
                    echo($_SESSION["login_user"]);
                    echo("No results found");
                }
                
                
            ?>
        </tbody> 
    <table>
    <?php
        include("includes/closeDBConn.php");
    ?>
    <h2 align="right"><a href = "includes/logout.php">Logout</a></h2>
</body>
</html>