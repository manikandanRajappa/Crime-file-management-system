<?php
session_start();
include("dbconnect.php");
extract($_POST);
$rdate=date("d-m-Y");
if(isset($btn))
{
$mq=mysql_query("select max(id) from station");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;



$qry=mysql_query("insert into station(id,station,location,city,contact,pass) values($id,'$station','$location','$city','$contact','1234')");
if($qry)
{
//header("location:view_student.php");
?>
<script language="javascript">
alert("Added Successfully");
window.location.href="view_station.php";
</script>
<?php
}


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
				
				 
                return true;
            }
        </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="hd" align="center"><?php include("title.php"); ?></div>
  <?php include("link_admin.php"); ?>
  <p>&nbsp;</p>
  <h2 align="center">Station</h2>
  <table width="377" height="122" border="0" align="center" cellpadding="5">
    <tr>
      <th width="119" align="left" scope="row">Station Name </th>
      <td width="142" align="left"><input type="text" name="station" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">Location</th>
      <td align="left"><input type="text" name="location" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">City</th>
      <td align="left"><input type="text" name="city"></td>
    </tr>
    <tr>
      <th align="left" scope="row">Contact No. </th>
      <td align="left"><input type="text" name="contact" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Submit" onClick="return validate()" /></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
