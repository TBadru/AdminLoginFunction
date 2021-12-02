
<?PHP

// connect to the database
$user = "";
$pass = "";


$connection_string = '';
$connection = odbc_connect( $connection_string, $user, $pass );

if ($connection) {

echo " connected to DB";
}

else{
die("Not connected to DB");
}

?>


<!DOCTYPE html>
<html> 
<head>

  <!--
      <script type="text/javascript">
         let my_url= "";
         window.onload = function(){
          window.location.replace(my_url)
         }
    </script>

  -->
  
<fieldset>
<center> <a href="AdminLoginFunctionPage1.php"><img src="AMTIVOLogo.jpg" alt="AMTIVO Logo" width="250" height="180"></a></center>
<meta charset="utf-8">  
<title> AMTIVO Admin Login Function</title>
</fieldset>
</head>
<body>
    
 <h3 align = "center">Display selected user session variables below ;</h3>
<form align="center" method="post" action="" target="_self">
<fieldset>
    <br>
  <textarea name="message" rows="12" cols="100" readonly> 
  	
   <?php
      
$query = "".htmlspecialchars($_POST['userid']);

$rs = odbc_exec($connection, $query);

while (odbc_fetch_row($rs))

{

  // initialize session variables
$_SESSION[""] = odbc_result($rs,'user_email');
$_SESSION[""] = odbc_result($rs,'user_password');
$_SESSION[""] = odbc_result($rs,'FranchiseID');
$_SESSION[""] = odbc_result($rs,'user_groups');
$_SESSION[""] = odbc_result($rs,'user_firstname')." ".odbc_result($rs,'user_surname'); 
$_SESSION[""] = odbc_result($rs,'username');
$_SESSION[""]= odbc_result($rs,'level');
$_SESSION[""]= odbc_result($rs,'userid');
$_SESSION[""] = '1';



 // display session variables of selected user in the readonly textfield 
print_r("email: ".$_SESSION['']);
print_r("pwd: ".$_SESSION['']);
print_r("Franchise: ".$_SESSION['']);
print_r("login: ".$_SESSION['']);
print_r("permissions: ".$_SESSION['']);
print_r("fullname: ".$_SESSION['']);
print_r("username: ".$_SESSION['']);
print_r("level: ".$_SESSION['']);
print_r("userID: ".$_SESSION['']);



}    
 ?>

  </textarea>
  <br><br>
</fieldset>
  <br>
<input type="submit" value="next"> 
</form>
<table border=0 cellspacing=0 cellpadding=0 border=0 width='20%' align='center'><tr><td>&nbsp;</td></tr><tr><td><p align='center'>&copy; 2021 - Amtivo Group</p></td></tr></table>
</body>
</html>
