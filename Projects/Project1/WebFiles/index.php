<?php
   include("includes/openDBConn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT uniqueid FROM projectlogin WHERE username = '".$myusername."' AND password = '".$mypassword."'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         echo("Login successful");
         header("location:welcome.php");
         exit;
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
     }
?>
<!DOCTYPE html>
   
   <head>
      <title>Login Page</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
   </head>
   
   <body bgcolor = "#FF9999">
      <div align="center">
         <div style = "width:300px; border: solid 1px #333333; align=left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Login" action = "welcome.php"/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php //echo $error; ?></div>
            </div>	
         </div>
         <div>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
         </div>		
      </div>
   </body>
</html>
