<?php

session_start();

header("Cache-Control: no-cache");

// Instead of redirecting, we make a session variable equal to the input data
if(!empty($_POST["firstname"]))
{
    $_SESSION["firstname"] = $_POST["firstname"];
}
if(!empty($_POST["lastname"]))
{
    $_SESSION["lastname"] = $_POST["lastname"];
}
if(!empty($_POST["cardnumber"]))
{
    $_SESSION["cardnumber"] = $_POST["cardnumber"];
}
if(!empty($_POST["cardtype"]))
{
    $_SESSION["cardtype"] = $_POST["cardtype"];
}
if(!empty($_POST["expiration"]))
{
    $_SESSION["expiration"] = $_POST["expiration"];
}
if(!empty($_POST["ccv"]))
{
    $_SESSION["ccv"] = $_POST["ccv"];
}
if(!empty($_POST["address"]))
{
    $_SESSION["address"] = $_POST["address"];
}
if(!empty($_POST["city"]))
{
    $_SESSION["city"] = $_POST["city"];
}
if(!empty($_POST["state"]))
{
    $_SESSION["state"] = $_POST["state"];
}
if(!empty($_POST["zip"]))
{
    $_SESSION["zip"] = $_POST["zip"];
}
if(!empty($_POST["country"]))
{
    $_SESSION["country"] = $_POST["country"];
}

// Check if any of them are empty
if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || 
        empty($_POST["cardnumber"]) || empty($_POST["cardtype"]) ||
        empty($_POST["expiration"]) || empty($_POST["ccv"]) ||
        empty($_POST["address"]) || empty($_POST["city"]) || empty($_POST["state"]) || 
        empty($_POST["zip"]) || empty($_POST["country"]))
{
    $_SESSION["errorMessage"] = "* Please fill out all of the required elements";
    header("Location:index.php");
    exit;
}
// Redirect
header("Location:displayBillingData.php");
?>
