<?php
session_start();
include("dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");

if($_REQUEST['act']=="ok")
{
$cid=$_REQUEST['cid'];
$user=$_REQUEST['user'];
$qry=mysql_query("select * from register where uname='$user'");
$row=mysql_fetch_array($qry);
$mobile=$row['contact'];

mysql_query("update requires set status=1 where id=$cid");
$message="Your requirement has forward to RI";
		echo '<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=AccessContr&password=733763493&sendername=Access&mobileno=91'.$mobile.',&message='.$message.'" style="display:block"></iframe>';
//header("location:home_vo.php");
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
    
     <div class="subhead">
	<ul id="menu">
	   <li><a href="home_vo.php">HOME</a></li>
	   <li><a href="logout.php">LOGOUT</a></li>
	</ul>
</div>
     <p>&nbsp;</p>
     <div align="center">
       <h3>Welcome to VAO
       </h3>
     </div>
     <p>
       <?php
	 $q1=mysql_query("select * from requires where status=0");
	 $n1=mysql_num_rows($q1);
	 if($n1>0)
	 {
	 ?>
</p>
  <table width="1015" border="1" align="center">
    <tr>
      <th width="67">Sno</th>
      <th width="100">User</th>
      <th width="204">Requires</th>
      <th width="226">Location</th>
      <th width="130">Posted Date </th>
      <th width="121">Action</th>
      <th width="121">Replies</th>
    </tr>
    <?php
	   $i=0;
	   while($r1=mysql_fetch_array($q1))
	   {
	   $i++;
	   ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $r1['uname']; ?></td>
      <td><?php echo $r1['description']; 
	  if($r1['cimage']!="")
		 {
		 echo '<br><a href="upload/'.$r1['cimage'].'" target="_blank">Image</a>';
		 }
		 ?></td>
      <td><?php echo $r1['location']; ?></td>
      <td><?php echo $r1['rdate']; ?></td>
      <td><a href="home_vo.php?act=ok&cid=<?php echo $r1['id']; ?>&user=<?php echo $r1['uname']; ?>">Send to RI</a> </td>
      <td><?php echo '<a href="add_reply.php?cid='.$r1['id'].'">Add</a> | ';
	  
	  echo '<a href="view_reply2.php?cid='.$r1['id'].'">View</a>'; ?></td>
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
