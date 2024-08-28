<?php
session_start();
include("dbconnect.php");
extract($_POST);
$month=date("m");
$year=date("Y");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #0033FF;
	font-weight: bold;
}
.style2 {
	color: #990000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_sp.php"); ?>
  <p>&nbsp;</p>
  <h2 align="center">Crime Report </h2>
  <p align="center">
    <select name="month">
      <?php
	  $q1=mysql_query("select distinct(month) from complaint order by month");
	  while($r1=mysql_fetch_array($q1))
	  {
	  ?>
      <option <?php if($month==$r1['month']) echo "selected"; ?>><?php echo $r1['month']; ?></option>
      <?php
	  }
	  ?>
    </select>
    &nbsp;
    <select name="year">
      <?php
	  $q11=mysql_query("select distinct(year) from complaint order by year");
	  while($r11=mysql_fetch_array($q11))
	  {
	  ?>
      <option <?php if($year==$r11['year']) echo "selected"; ?>><?php echo $r11['year']; ?></option>
      <?php
	  }
	  ?>
    </select>
  &nbsp;
  <select name="city">
    <?php
	  $q12=mysql_query("select distinct(city) from station order by city");
	  while($r12=mysql_fetch_array($q12))
	  {
	  ?>
    <option <?php if($city==$r12['city']) echo "selected"; ?>><?php echo $r12['city']; ?></option>
    <?php
	  }
	  ?>
  </select>
  <input type="submit" name="btn" value="Submit" />
  </p>
  <?php
  $qry=mysql_query("select * from complaint where month='$month' && year='$year' && city='$city' order by id desc");
  $num=mysql_num_rows($qry);
  if($num==1)
  {
  while($row=mysql_fetch_array($qry))
  {
  $station=$row['station'];
  $q4=mysql_query("select * from station where station='$station'");
$r4=mysql_fetch_array($q4);
  ?>
  <table width="505" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <th colspan="2" align="left" class="submenu" scope="row">Complaint by <?php echo $row['uname']; ?>, Date on : <?php echo $row['dtime'];?></th>
    </tr>
    <tr>
      <th rowspan="5" align="center" scope="row"><?php echo '<img src="upload/'.$row['cimage'].'" width="100" height="100">'; ?></th>
      <td><span class="style2"><?php echo "Station: ".$r4['station']."-".$r4['location']; ?></span></td>
    </tr>
    <tr>
      <td width="237"><strong>Complaint: </strong><?php echo $row['description']; ?></td>
    </tr>
    <tr>
      <td><strong>Location: </strong><?php echo $row['location']; ?></td>
    </tr>
    <tr>
      <td><span class="style1"><?php
	  if($row['status']=="1")
	  {
	  echo "Started";
	  }
	  else if($row['status']=="2")
	  {
	  echo "Process";
	  }
	  else if($row['status']=="3")
	  {
	  echo "Completed";
	  }
	  else
	  {
	  echo "Yet to Start";
	  }
	  
	  ?>
      </span></td>
    </tr>
    <tr>
      <td align="right"></td>
    </tr>
  </table>
  <?php
  }
  }
  ?>
  <p align="center">&nbsp; </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
