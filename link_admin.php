<script language="javascript">
// JavaScript Document
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
</script>

<div class="subhead">
	<ul id="menu">
	   <li><a href="admin.php" onMouseOver="mopen('m1')" onMouseOut="mclosetime()">HOME</a>
	  <div id="m1" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
			<a href="admin_send.php">SEND</a>
			<a href="admin_rec.php">RECEIVE</a>
		</div>
	   </li>
	   <li><a href="view_station.php" onMouseOver="mopen('m2')" onMouseOut="mclosetime()">STATION</a>
	   <div id="m2" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
			<a href="add_station.php">ADD NEW</a>
		</div>
	   </li>
	   <li><a href="view_allocate.php" onMouseOver="mopen('m4')" onMouseOut="mclosetime()">COMPLAINTS</a>
	   <div id="m4" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		<a href="report.php">REPORT</a>
		</div>
	   </li>
	   <li><a href="logout.php">LOGOUT</a></li>
	</ul>
</div>