<?php
session_start();
include("dbconnect.php");
extract($_POST);
if(isset($btn))
{
$qry=mysql_query("select * from login where username='$uname' && password='$pass' ");
$num=mysql_num_rows($qry);
	if($num==1)
	{
	$_SESSION['uname']=$uname;
		if($utype=="1")
		{
		header("location:home_vo.php");
		}
		else if($utype=="2")
		{
		header("location:home_ri.php");
		}
		else if($utype=="3")
		{
		header("location:home_col.php");
		}
	}
	else
	{
	$msg="Login Incorrect!";	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_home.php"); ?>
  <p>&nbsp;</p>
  <table width="844" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top"><img src="images/auplied.jpg" width="467" height="388" /></td>
      <td valign="top"><table width="352" height="176" border="0" align="center" cellpadding="5" class="bor">
        <tr>
          <th colspan="2" scope="row">OFFICER LOGIN </th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="msg" scope="row"><?php echo $msg; ?></th>
        </tr>
        <tr>
          <th colspan="2" align="center" scope="row"><input name="utype" type="radio" value="1" />
            VAO
              <input name="utype" type="radio" value="2" />
              POLICE
              <input name="utype" type="radio" value="3" />
            COLLECTOR </th>
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
