<?php
session_start();
include("dbconnect.php");
extract($_POST);
if(isset($btn))
{

	
		if($utype=="1")
		{
			$qry=mysql_query("select * from station where station='$uname' && pass='$pass' ");
			$num=mysql_num_rows($qry);
				if($num>0)
				{
				$_SESSION['uname']=$uname;
				header("location:station.php");
				}
				else
				{
				$msg="Invalid User!";
				}
		}
		else if($utype=="2")
		{
			$qry=mysql_query("select * from login where username='$uname' && password='$pass' && utype=4");
			$num=mysql_num_rows($qry);
				if($num>0)
				{
				$_SESSION['uname']=$uname;
				header("location:sphome.php");
				}
				else
				{
				$msg="Invalid User!";
				}
		}
		else if($utype=="3")
		{
			$qry=mysql_query("select * from login where username='$uname' && password='$pass' && utype=5");
			$num=mysql_num_rows($qry);
				if($num>0)
				{
				$_SESSION['uname']=$uname;
				header("location:admin.php");
				}
				else
				{
				$msg="Invalid User!";
				}
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
      <th valign="top" scope="row"><img src="images/crime.jpg" width="413" height="310" /></th>
      <td valign="top"><table width="352" height="176" border="0" align="center" cellpadding="5" class="bor">
        <tr>
          <th colspan="2" scope="row">LOGIN </th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="msg" scope="row"><?php echo $msg; ?></th>
        </tr>
        <tr>
          <th colspan="2" align="center" scope="row">
		    <input name="utype" type="radio" value="1" />
            STATION
		    <input name="utype" type="radio" value="2" />
            SP
            <input name="utype" type="radio" value="3" />
            IG</th>
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
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
