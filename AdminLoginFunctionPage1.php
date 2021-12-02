
<?php

  // start session

  session_start();
  echo "<br>";
  // echo session

  echo session_id();
  echo "<br>";
  
$user = "";
$pass = "";

// $connection_string =  '';
$connection_string = ''; 
$connection = odbc_connect( $connection_string, $user, $pass );

if ($connection) {

echo "connected to DB";

}


else{
die("Not connected to DB");
}

?>

  
<!DOCTYPE html>
<html>
<head> 
<fieldset>
<center><img src="AMTIVOLogo.jpg" alt="AMTIVO Logo" width="250" height="180"></center>
<meta charset="utf-8">
<title> AMTIVO Admin Login Function</title>
</fieldset>
</head>
<body>
    
<h3 align = "center">logging in to AMTIVO as ;</h3>
<form align="center" method="post" action="AdminLoginFunctionPage2.php" target="_self">
 <fieldset>
<label>sign in as a user from the drop down list below;</label>
<br><br>
<select name="userid">
<option value="Firstname, Surname" selected >-- select a user --</option>

<?php

// $query = "";
$rs = odbc_exec($connection, $queryActive);

while (odbc_fetch_row($rs))

{
$result = odbc_result($rs,'user_firstname')." ".odbc_result($rs,'user_surname');
$userid = odbc_result($rs,'userid');

echo " <option value=".$userid.">";
echo $result;
echo "</option>";

}
?>

</select>
<br><br>
<input type="submit" value="log In">  <input type="reset" value="reset">
</fieldset>
</form>
<table border=0 cellspacing=0 cellpadding=0 border=0 width='20%' align='center'><tr><td>&nbsp;</td></tr><tr><td><p align='center'>&copy; 2021 - Amtivo Group</p></td></tr></table>
</body>
</html>

