<?php
session_start();
include("dbconnect.php");
extract($_POST);
echo "checking".$btn;
echo "username".$uname;
if(isset($btn))
{
$qry=mysql_query("select * from register where uname='$uname' && pass='$pass' ");
if (!$qry) {
  die("Database query failed: " . mysql_error());
}
echo "Debug SQL Query: " . $qry;
$num=mysql_num_rows($qry);
echo "num check". $num;
	if($num==1)
	{
		$_SESSION['uname']=$uname;
		header("location:userhome.php");
	}
	else
	{
	$msg="Login Incorrect!";	
	}
}
?>
<html>
<head>
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_home.php"); ?>
  <p>&nbsp;</p>
  <table width="844" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th valign="top" scope="row"><img src="images/crime.jpg" width="413" height="310"></th>
      <td valign="top"><table width="352" height="176" border="0" align="center" cellpadding="5" class="bor">
        <tr>
          <th colspan="2" scope="row">LOGIN </th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="msg" scope="row"><?php echo $msg; ?></th>
        </tr>
        <tr>
          <th width="167" align="left" scope="row">Username</th>
          <td width="190" align="left"><input type="text" name="uname" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">Password</th>
          <td align="left"><input type="password" name="pass" /></td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td><input type="submit" name="btn" value="Login" /></td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td><a href="register.php">New User </a> </td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
