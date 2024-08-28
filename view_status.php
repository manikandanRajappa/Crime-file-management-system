<?php
session_start();
include("dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");

$qry=mysql_query("select * from register where uname='$uname'");
$row=mysql_fetch_array($qry);
$mobile=$row['contact'];
?>
<html>
<head>
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="post" name="form1" id="form1">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
    
      <?php include("link_user.php"); ?>
     <p align="center">&nbsp;</p>
     <h3 align="center">Status</h3>
	 <?php
	 $q1=mysql_query("select * from requires where uname='$uname'");
	 $n1=mysql_num_rows($q1);
	 if($n1>0)
	 {
	 ?>
     <table width="843" border="1" align="center">
       <tr>
         <th width="67">Sno</th>
         <th width="152">Requires</th>
         <th width="145">Location</th>
         <th width="211">Posted Date </th>
         <th width="107">Status</th>
         <th width="121">Replies</th>
       </tr>
	   <?php
	   $i=0;
	   while($r1=mysql_fetch_array($q1))
	   {
	   $i++;
	   $cid=$r1['id'];
	   	$days=(strtotime($rdate)-strtotime($r1['rdate']))/(60*60*24);
	   	if($days>6 && $r1['status']<2)
		{
		$message="Your requirement has forward to RI";
		echo '<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=AccessContr&password=733763493&sendername=Access&mobileno=91'.$mobile.',&message='.$message.'" style="display:none"></iframe>';
		mysql_query("update requires set status=2 where id=$cid");
		}
		else if($days>3 && $r1['status']<1)
		{
		$message="Your requirement has forward to Collector";
		echo '<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=AccessContr&password=733763493&sendername=Access&mobileno=91'.$mobile.',&message='.$message.'" style="display:none"></iframe>';
		mysql_query("update requires set status=1 where id=$cid");
		}
	   
	   ?>
       <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $r1['description']; 
		 if($r1['cimage']!="")
		 {
		 echo '<br><a href="upload/'.$r1['cimage'].'" target="_blank">Image</a>';
		 }
		 ?></td>
         <td><?php echo $r1['location']; ?></td>
         <td><?php echo $r1['rdate']; ?></td>
         <td><?php
		 if($r1['status']=="0")
		 {
		 echo "Process by VO";
		 }
		 else if($r1['status']=="1")
		 {
		 echo "Process by RI";
		 }
		 else if($r1['status']=="2")
		 {
		 echo "Process by Collector";
		 }
		 else if($r1['status']=="3")
		 {
		 echo "Completed";
		 }
		 ?></td>
         <td><?php echo '<a href="view_reply.php?cid='.$r1['id'].'">View Reply</a>'; ?></td>
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
     <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
