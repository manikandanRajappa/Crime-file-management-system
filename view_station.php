<?php
session_start();
include("dbconnect.php");
extract($_POST);


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
  <?php include("link_admin.php"); ?>
  <p>&nbsp;</p>
  <h2 align="center">Police Station</h2>
  <?php

  $qry=mysql_query("select * from station");
  $num=mysql_num_rows($qry);
  	if($num>0)
	{
  ?>
  <table width="497" border="1" align="center">
    <tr>
      <th width="31" scope="row">Sno</th>
      <th width="74">Station</th>
      <th width="50">Location</th>
      <th width="62">City</th>
      <th width="103">Contact No. </th>
    </tr>
	<?php
	$i=0;
	
	while($row=mysql_fetch_array($qry))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['station']; ?></td>
      <td><?php echo $row['location']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['contact']; ?></td>
    </tr>
	<?php
	}
	?>
  </table>
  <?php
  }
  else
  {
  echo "Empty!!";
  }

  ?>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
