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

$mq=mysql_query("select max(id) from requires");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

	if($_FILES['file']['name']!="")
	{
	$fname="F".$id.$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], "upload/".$fname);
	}
	else
	{
	$fname="";
	}
    		$qry=mysql_query("insert into requires(id,uname,cimage,description,location,month,year,status,rdate) values($id,'$uname','$fname','$description','$location','$month','$year','0','$rdate')");
		if($qry)
		{
		?>
		<script language="javascript">
		alert("Your Requirement has been posted successfully...");
		window.location.href="view_status.php";
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
         <td valign="top"><p><img src="images/11074997_G.jpg" width="399" height="209" /></p>
         <p><img src="images/khmer-logging-oct92015.jpg" width="399" height="270" /></p></td>
         <td valign="top"><table width="443" height="255" border="0" align="center" cellpadding="5" class="bor">
           <tr>
             <th colspan="2"> Your Requires </th>
           </tr>
           <tr>
             <td colspan="2" class="msg"><?php echo $msg; ?></td>
           </tr>
           <tr>
             <td>Your Requires/Queries </td>
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
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
