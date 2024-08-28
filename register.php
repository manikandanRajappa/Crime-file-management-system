<?php
session_start();
include("dbconnect.php");
extract($_POST);
$rdate=date("d-m-Y");
if(isset($btn))
{
$mq=mysql_query("select max(id) from register");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$qry=mysql_query("insert into register(id,name,contact,email,area,city,adhar,uname,pass,rdate) values($id,'$name','$contact','$email','$area','$city','$adhar','$uname','$pass','$rdate')");
if($qry)
{
?>
<script language="javascript">
alert("Registered Successfully");
window.location.href="index.php";
</script>
<?php
}
else
{

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
      <th valign="top" scope="row"><img src="images/1179906100165.jpg" width="571" height="354"></th>
      <td valign="top"><table width="352" height="176" border="0" align="center" cellpadding="5" class="bor">
        <tr>
          <th colspan="2" scope="row">New User </th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="msg" scope="row"><?php echo $msg; ?></th>
        </tr>
        <tr>
          <th align="left" scope="row">Name</th>
          <td align="left"><input type="text" name="name" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">Contact No. </th>
          <td align="left"><input type="text" name="contact" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">E-mail ID </th>
          <td align="left"><input type="text" name="email" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">Area</th>
          <td align="left"><input type="text" name="area" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">City</th>
          <td align="left"><input type="text" name="city" /></td>
        </tr>
        <tr>
          <th align="left" scope="row">Aadhar Card No. </th>
          <td align="left"><input type="text" name="adhar" /></td>
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
          <th align="left" scope="row">Confirm Password </th>
          <td align="left"><input type="password" name="cpass" /></td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td><input type="submit" name="btn" value="Register" /></td>
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
