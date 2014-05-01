<html>
    <head>
        <style>
            .f
            {
                font-size: 12pt;
                font-weight: bold;
            }
        </style>
    </head>
    <?php include 'header.php';?>
     <body><div class="adapppro">
     <form method="post" action="">
         <p align="center">
<?php
require_once 'connect_db.php';
$query = mysql_query("select ename from events;"); // Run your query

echo "Please Select a Event to to view more info<br>";
echo '<select name="ename" OnChange="submit()"> <option value="-1">Select</option>'; // Open your drop down box

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
         <font class="f">Event Name:</font><?php echo $row['ename']; ?>
  <!--<input name="1" type="text" id="pagename" onfocus="this.blur" readonly="true" value="--><!--">-->
         <font class="f">Date:</font>
  <!--<input placeholder="YYYY-MM-DD" type="text" id="pagekey" onfocus="this.blur" readonly="true" value="--><?php echo $row['date1']; ?><!--" name="3" size="12">-->
         <font class="f">Venue:</font>
  <!--<input name="4" type="text" id="pagename" value="--><?php echo $row['place']; ?><!--">-->
  <!--Winner1:
  <input name="6" type="text" id="pagekey" value="<?php echo $row['Winner1']; ?>">
  Winner2:
  <input name="7" type="text" id="pagename" value="<?php echo $row['Winner2']; ?>">
  Winner3:
  <input name="8" type="text" id="pagekey" value="<?php echo $row['Winner3']; ?>">
  -->
  <p class="f"><font>Description:</font></p>
  <!--<textarea name="2" cols="50" rows="6" onfocus="this.blur" readonly="true" id="pagecont">--><?php echo $row['desc1']; ?><!--</textarea>-->
  <p class="f">Organisers:</p>
  <!--<textarea name="5" cols="70" rows="6" onfocus="this.blur" readonly="true" id="pagecont">--><?php echo $row['orgs']; ?><!--</textarea>-->
  <br><br><a href="disp_events.php">Back</a>
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