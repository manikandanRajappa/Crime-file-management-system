<?php
session_start();
include("dbconnect.php");
extract($_POST);
$rdate=date("d-m-Y");
if(isset($btn))
{
$mq=mysql_query("select max(id) from message");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$qry=mysql_query("insert into message(id,user,message) values($id,'SP','$message')");
if($qry)
{
//header("location:view_student.php");
?>
<script language="javascript">
alert("Added Successfully");
window.location.href="sp_send.php";
</script>
<?php
}
}
////////////////////////////
if($_REQUEST['act']=="del")
{
$did=$_REQUEST['did'];
mysql_query("delete from message where id=$did");
header("location:sp_send.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
 <script language="javascript">
            function validate()
            {
			  
                if (document.form1.station.value == "")
                {
                    alert("Enter the Station Name");
                    document.form1.station.focus();
                    return false;
                }
				if (document.form1.location.value == "")
                {
                    alert("Enter the Location");
                    document.form1.location.focus();
                    return false;
                }
				
				  } 
              
                return true;
            }
        </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_sp.php"); ?>
  <p>&nbsp;</p>
  <h2 align="center">Message from IG </h2>
  <p align="center">&nbsp;</p>
  <?php
  $q1=mysql_query("select * from message where user='admin' order by id desc");
  $n1=mysql_num_rows($q1);

 if($n1>0)
 {
  ?>
  <table width="542" height="55" border="1" align="center">
    <tr>
      <th width="75" scope="row">Sno</th>
      <th width="262">Message</th>
      <th width="156">Date/Time</th>
    </tr>
	<?php
	$i=0;
	while($r1=mysql_fetch_array($q1))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $r1['message']; ?></td>
      <td><?php echo $r1['dtime']; ?></td>
    </tr>
	<?php
	}
	?>
  </table>
  <?php
  }
  ?>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
