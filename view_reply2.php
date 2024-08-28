<?php
session_start();
include("dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
$cid=$_REQUEST['cid'];
?>
<html>
<head>
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
    
     <div class="subhead">&nbsp;</div>
     <p>&nbsp;</p>
     <div align="center">
       <h3>Reply</h3>
     </div>
     <p>
       <?php
	 $q1=mysql_query("select * from reply where id='$cid'");
	 $n1=mysql_num_rows($q1);
	 if($n1>0)
	 {
	 ?>
</p>
     <table width="639" border="1" align="center">
       <tr>
         <th width="59">Sno</th>
         <th width="261">Reply Message </th>
         <th width="149">Reply by </th>
         <th width="106"> Date </th>
       </tr>
       <?php
	   $i=0;
	   while($r1=mysql_fetch_array($q1))
	   {
	   $i++;
	   ?>
       <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $r1['reply']; ?></td>
         <td><?php 
		 if($r1['officer']=="officer1")
		 {
		 echo "Reply by VO";
		 }
		 else if($r1['officer']=="officer2")
		 {
		 echo "Reply by RI";
		 }
		 else if($r1['officer']=="officer3")
		 {
		 echo "Reply by Collector";
		 }
		 ?></td>
         <td><?php echo $r1['rdate']; ?></td>
       </tr>
       <?php
	   }
	   ?>
     </table>
     <?php
	 }
	 else
	 {
	 echo "<p>Empty..</p>";
	 }
	 ?>
<p align="center">
  <?php
  if($uname=="officer1")
  {
  ?>
  <a href="home_vo.php">Back</a>
  <?php
  }
  else if($uname=="officer2")
  {
  ?>
  <a href="home_ri.php">Back</a>
  <?php
  }
  else if($uname=="officer3")
  {
  ?>
  <a href="home_col.php">Back</a>
  <?php
  }
  ?>
  
  </p>
  <p>&nbsp;</p>
</form>
</body>
</html>
