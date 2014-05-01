<html>
    <head>
    </head>
     <body>
        <script language="javascript" type="text/javascript" src="pickdate.js"/>
        <script type="text/javascript" language="javascript">
function buildSubCategory()
{
	frm = document.addBook;		// Form Name
	var memtype = frm.memtype.value;
	var url = ""+window.location;
	symbol = url.indexOf("?");		// Get the position of '?' so as to take only the url till that symbol for 	2nd time submission.
	url = url.substring(0, symbol);
	location.href= url + "?memtype=" + memtype;		// Reload the URL with GET parameters
}

</script>
     <form method="post" action="">
         <p align="center">
<?php
require_once 'connect_db.php';
$query = mysql_query("select ename from events;"); // Run your query

echo "Please Select a Event to Update";echo '<select name="ename" OnChange="submit()"> <option value="-1">Select</option>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['ename'].'">'.$row['ename'].'</option>';
}
echo '</select>';// Close your drop down box

?></p>


<?php

error_reporting(E_ERROR | E_PARSE);

include 'connect_db.php';

$ename=$_POST['ename'];
$query="select ename,desc1,date1,place,orgs,Winner1,Winner2,Winner3 from events where ename='$ename'";
trim($query);
$query=stripcslashes($query);
$query_html=htmlspecialchars($query);
$result=mysql_query($query);
//print "<h2 align='center'>STUDENT EMAIL DETAILS</h2>";
while($row = mysql_fetch_array($result))
  {
?>
         <hr width="100%">
  Event Name:
  <input name="1" type="text" id="pagename" onfocus="this.blur" readonly="true" value="<?php echo $row['ename']; ?>">
  Date:
  <input placeholder="YYYY-MM-DD" type="text" id="pagekey" value="<?php echo $row['date1']; ?>" name="3" size="12"><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
 <!-- <input name="3" type="text" id="pagekey" value="">
  <table><tr><td><input placeholder="YYYY-MM-DD" type="text" id="pagekey" value="<?php echo $row['date1']; ?>" name="3" size="12"></td><td><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td></tr></table>-->
  Venue:
  <input name="4" type="text" id="pagename" value="<?php echo $row['place']; ?>">
  Winner1:
  <input name="6" type="text" id="pagekey" value="<?php echo $row['Winner1']; ?>">
  Winner2:
  <input name="7" type="text" id="pagename" value="<?php echo $row['Winner2']; ?>">
  Winner3:
  <input name="8" type="text" id="pagekey" value="<?php echo $row['Winner3']; ?>">
  <p>Description:</p>
  <textarea name="2" cols="120" rows="12" id="pagecont"><?php echo $row['desc1']; ?></textarea>
  <p>Organisers:</p>
  <textarea name="5" cols="120" rows="8" id="pagecont"><?php echo $row['orgs']; ?></textarea>
  <input type='Submit' name='sub' value='Update'>
  <hr width="100%">
<?php
  }
?>
</form>
<?php
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
if(isset($_POST['sub']))
{
 $ename=clean($_POST['1']);
 $edesc=clean($_POST['2']);
 $edate=clean($_POST['3']);
 $eplace=clean($_POST['4']);
 $eorgs=clean($_POST['5']);
 $win1=clean($_POST['6']);
 $win2=clean($_POST['7']);
 $win3=clean($_POST['8']);
echo"<script>alert('$ename')</script> ";
    if($ename==''||$edesc==''||$edate==''||$eplace==''||$eorgs=='')
    {
        echo "<script>
            alert('Please Fill all the details!!!');
           header('location:event_mgt.php')  
            </script> ";
    }    
    else 
        {
    include 'connect_db.php';
    $query="update events SET ename='$ename',desc1='$edesc',date1='$edate',place='$eplace',orgs='$eorgs',Winner1='$win1',Winner2='$win2',Winner3='$win3' where ename='$ename'";
    trim($query);
    $query=stripcslashes($query);
    $query_html=htmlspecialchars($query);
    $result=mysql_query($query);
    $row=mysql_affected_rows();
    if(!$row)
    {
        echo "<script>
            alert('Update failed try Again!!!');
          header('location:event_mgt.php')  
            </script> ";
    }
    else
        {
        echo "<script>";
        echo "alert('Event info is successfully updated');
            header('location:event_mgt.php')  
            </script> ";
    }
}}
?>
</body>
</html>