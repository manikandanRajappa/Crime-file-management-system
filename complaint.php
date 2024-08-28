<?php
session_start();
include("dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
if(isset($btn))
{
$month=date("m");
$year=date("Y");

$mq=mysql_query("select max(id) from complaint");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

	if($_FILES['file']['name']!="")
	{
	$fname="C".$id.$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], "upload/".$fname);
	}
	else
	{
	$fname="";
	}
    		$qry=mysql_query("insert into complaint(id,uname,station,city,cimage,description,location,month,year,status,rdate) values($id,'$uname','','','$fname','$description','$location','$month','$year','0','$rdate')");
		if($qry)
		{
		?>
		<script language="javascript">
		alert("Your complaint has been posted successfully...");
		window.location.href="complaint.php";
		</script>
		<?php
		}
		else
		{
		//echo "failed";
		}

	

}
?>
<html>
<head>
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
    
      <?php include("link_user.php"); ?>
     <p>&nbsp;</p>
     <table width="70%" border="0" align="center" cellpadding="5" cellspacing="0">
       <tr>
         <td valign="top"><p>&nbsp;</p>
         </td>
         <td valign="top"><table width="443" height="255" border="0" align="center" cellpadding="5" class="bor">
           <tr>
             <th colspan="2"> Your Complaints </th>
           </tr>
           <tr>
             <td colspan="2" class="msg"><?php echo $msg; ?></td>
           </tr>
           <tr>
             <td>Your Complaint </td>
             <td><textarea name="description" cols="40" rows="5"></textarea></td>
           </tr>
           <tr>
             <td>Image</td>
             <td><input type="file" name="file" /></td>
           </tr>
           <tr>
             <td>Location</td>
             <td><input type="text" name="location" /></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td><input type="submit" name="btn" value="Submit" /></td>
           </tr>
         </table></td>
       </tr>
     </table>
     
     <p>
       <?php
	 $q1=mysql_query("select * from complaint where uname='$uname'");
	 $n1=mysql_num_rows($q1);
	 if($n1>0)
	 {
	 ?>
</p><h2 align="center">Complaints</h2>
     <table width="716" border="1" align="center">
       <tr>
         <th width="67">Sno</th>
         <th width="152">Requires</th>
         <th width="145">Location</th>
         <th width="211">Posted Date </th>
         <th width="107">Status</th>
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
		//$message="Your requirement has forward to RI";
		//echo '<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=AccessContr&password=733763493&sendername=Access&mobileno=91'.$mobile.',&message='.$message.'" style="display:none"></iframe>';
		//mysql_query("update requires set status=2 where id=$cid");
		}
		else if($days>3 && $r1['status']<1)
		{
		//$message="Your requirement has forward to Collector";
		//echo '<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=AccessContr&password=733763493&sendername=Access&mobileno=91'.$mobile.',&message='.$message.'" style="display:none"></iframe>';
		//mysql_query("update requires set status=1 where id=$cid");
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
		 if($r1['status']=="1")
	  {
	  echo "Started";
	  }
	  else if($r1['status']=="2")
	  {
	  echo "Process";
	  }
	  else if($r1['status']=="3")
	  {
	  echo "Completed";
	  }
	  else
	  {
	  echo "Yet to Start";
	  }
		 ?></td>
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
</form>
</body>
</html>
