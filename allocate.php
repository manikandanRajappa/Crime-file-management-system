<?php
session_start();
include("dbconnect.php");
extract($_POST);
$cid=$_REQUEST['cid'];
$rdate=date("d-m-Y");
if(isset($btn))
{
//$q1=mysql_query("select * from station where station='$station'");
//$r1=mysql_fetch_array($q1);
//$city=$r1['city'];
	mysql_query("update complaint set station='$station',city='$city',status='1' where id=$cid");
	header("location:view_allocate2.php");
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
  <?php include("link_sp.php"); ?>
  <p>&nbsp;</p>
  <h2 align="center">Station</h2>
  <p align="center">
    <select name="city">
	<option value="">-Select-</option>
	<?php
	$cq=mysql_query("select distinct(city) from station");
	while($cr=mysql_fetch_array($cq))
	{
	?>
	<option <?php if($city==$cr['city']) echo "selected"; ?>><?php echo $cr['city']; ?></option>
	<?php
	}
	?>
    </select>
    &nbsp;
    <input type="submit" name="btn2" value="Submit" />
  </p>
  <?php
	if(isset($btn2))
	{
  $qry=mysql_query("select * from station where city='$city'");
  $num=mysql_num_rows($qry);
  	if($num>0)
	{
  ?>
  <table width="418" border="1" align="center">
    <tr>
      <th width="31" scope="row">Select</th>
      <th width="74">Station</th>
      <th width="50">Location</th>
      <th width="62">City</th>
    </tr>
	<?php
	$i=0;
	
	while($row=mysql_fetch_array($qry))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><input name="station" type="radio" value="<?php echo $row['station']; ?>" /></th>
      <td><?php echo $row['station']; ?></td>
      <td><?php echo $row['location']; ?></td>
      <td><?php echo $row['city']; ?></td>
    </tr>
	<?php
	}
	?>
  </table>
  <p align="center">
    <input type="submit" name="btn" value="Allocate" />
  </p>

  <?php
  }
  else
  {
  echo "Empty!!";
  }
}
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
