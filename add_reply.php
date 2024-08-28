<?php
session_start();
include("dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
$cid=$_REQUEST['cid'];
if(isset($btn))
{
$mq=mysql_query("select max(id) from reply");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$qry=mysql_query("insert into reply(id,cid,reply,officer,rdate) values($id,'$cid','$reply','$uname','$rdate')");
if($qry)
{
header("location:view_reply2.php");
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
    
     <div class="subhead">&nbsp;</div>
     <p>&nbsp;</p>
     <div align="center">
       <h3>Reply</h3>
     </div>
     <table width="618" height="166" border="0" align="center" cellpadding="5" cellspacing="0">
       <tr>
         <td>Reply Message </td>
         <td><textarea name="reply" cols="70" rows="5"></textarea></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td><input type="submit" name="btn" value="Submit"></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
     </table>
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
