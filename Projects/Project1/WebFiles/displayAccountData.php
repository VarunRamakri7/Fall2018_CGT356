<?php
session_start();

// If user does not input name, they are redirected to the index page
if(empty($_SESSION["firstname"]))
{
    header("Location:selectAccount.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8" />
    <title>Account Info - Information</title>
    <style type="text/css">
        ul{ list-style:none; margin-top:5px;}
        ul li{ display:block; float:left; width:100%; height:1%;}
        ul li label{ float:left; padding:7px; color:#666ff}
        ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
        li input:focus, li textarea:focus{ border:1px solid #666;}
        fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
        legend{ color:#000099; margin:0 10px 0 0; padding: 0 5px; font-size:11pt; font-weight:bold; }
        label span{ color:#ff0000; }
        fieldset#billing {position:absolute; top:60px; left:20px; }
        fieldset#submit {position:absolute; top:540px; left:20px; width:840px; text-align:center; }
        fieldset input#SubmitBtn{ background#ESESES; color:#000099; border:1px solid#ccc; padding:5px; width:150px; }
        div#nav { width:400px; position: absolute; top: 330px; left: 200px; }
        #nav1 { float: left; }
        #nav2 { float: right; }
        body {background-color: lightgrey;}
        #billing {background-color: lightblue;}
    </style>
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Account Info</h1>

<!-- Getting the billing data -->

    <fieldset id="billing">
        <legend>Account Info Information</legend>
        <ul>
            <li> <span><?php echo($_SESSION["uniqueid"]);?></span></li>
            <li> <span><?php echo($_SESSION["firstname"]);?></span></li>
            <li> <span><?php echo($_SESSION["lastname"]);?></span></li>
            <li> <span><?php echo($_SESSION["username"]);?></span></li>
            <li> <span><?php echo($_SESSION["password"]);?></span></li>
        </ul>
    </fieldset>

    <div id="nav">
        <span id="nav1"><a href="index.php">Continue Updating</a></span>
        <span id="nav2"><a href="finishedUpdateAccount.php">Finished Updating</a></span>
    </div>
</body>
</html>

