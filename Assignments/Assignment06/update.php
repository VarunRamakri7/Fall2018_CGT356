<?php
session_start();


if(empty($_SESSION["errorMessage"]))
{
    $_SESSION["errorMessage"] = "";
}


echo("<?xml version=\"1.0\" encoding =\"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8" />
    <title>Update Page</title>
    <style type="text/css">
        form{width:400px; margin: 0px auto;}
        ul{ list-style:none; margin-top:5px;}
        ul li{ display:block; float:left; width:100%; height:1%;}
        ul li label{ float:left; padding:7px;}
        ul li input{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:240px;}
        li input:focus{ border:1px solid #999;}
        fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
        legend{ color:#000000; margin:0 10px 0 0; padding: 0 5px; font-size:11pt; font-weight:bold; }
        label span{ color:#ff0000; }
        ul li span{color:#0000ff; font-weight:bold;}
        input#submit{width:248px;}
    </style>
</head>

<body>
    <h1 style="text-align:center;">Assignment06-Update</h1>
    <?php 
        include("includes/menu.php");
        
        $servername="localhost";
        $username="ramakri7";
        $password="19fire98";
        $dbname="Goblins";

        include("includes/openDBConn.php"); 

        $sql="SELECT DISTINCT UniqueID, Name, Role, Color, KillCount From Members WHERE UniqueID = '2' ";
        $result= $conn->query($sql);

        if($result->num_rows == 0)
        {
            $_SESSION["errorMessage"] = "You must first insert a Goblin with an ID of 2";
        }
        else
        {
            $row = $result->fetch_assoc();
        }
    ?>
        <form id="form0" name="form0" method="post" action="updateDo.php">
            <fieldset id="billing">
                <legend>Update items in Goblins Database</legend>
                <ul>
                    <li> <label title="UniqueID" for="uniqueid">UniqueID<span>*</span></label> <input type="text" name="uniqueiddis" id="uniqueiddis" disabled = "disabled" size="30" maxlength="30" value = "<?php if($result->num_rows != 0) { echo(trim($row["UniqueID"])); } ?>" /> <input type="hidden" name="uniqueid" id="uniqueid" value = "<?php if($result->num_rows != 0) { echo(trim($row["UniqueID"])); } ?>" /></li>
                    <li> <label title="Name" for="name">Name<span>*</span></label> <input type="text" name="name" id="name" size="30" maxlength="30"  value = "<?php if($result->num_rows != 0) { echo(trim($row["Name"])); } ?>" /></li>
                    <li> <label title="Role" for="role">Role<span>*</span></label> <input type="text" name="role" id="role" size="30" maxlength="30"  value = "<?php if($result->num_rows != 0) { echo(trim($row["Role"])); } ?>" /></li>
                    <li> <label title="Color" for="color">Color<span>*</span></label> <input type="text" name="color" id="color" size="30" maxlength="30"  value = "<?php if($result->num_rows != 0) { echo(trim($row["Color"])); } ?>" /></li>
                    <li> <label title="KillCount" for="killcount">KillCount<span>*</span></label> <input type="text" name="killcount" id="killcount" size="30" maxlength="30"  value = "<?php if($result->num_rows != 0) { echo(trim($row["KillCount"])); } ?>" /></li>
                    <li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
                    <li> <input id="submit" name="submit" type="submit" value="Update Info" /></li>
                </ul>
            </fieldset>

            <?php

                $_SESSION["errorMessage"] = "";

            ?>
            <script type="text/javascript">
                document.getElementByID("name").focus();
            </script>

        </form>
</body>

</html>

