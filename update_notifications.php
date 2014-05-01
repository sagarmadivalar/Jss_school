<html>
    <head>
        <script language="javascript" type="text/javascript" src="pickdate.js"/>
    </head>
     <body>
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
     <form method="post" action="" name="f1">
         <p align="center">
<?php
require_once 'connect_db.php';
$query = mysql_query("select title from notifications;"); // Run your query

echo "Please Select a Notification to Update";echo '<select name="nname" OnChange="f1.submit()"> <option value="-1">Select</option>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
}
echo '</select>';// Close your drop down box

?></p>


<?php

error_reporting(E_ERROR | E_PARSE);

include 'connect_db.php';

$ename=$_POST['nname'];
$query="select title,desc1,lastdate,contacts from notifications where title='$ename'";
trim($query);
$query=stripcslashes($query);
$query_html=htmlspecialchars($query);
$result=mysql_query($query);
//print "<h2 align='center'>STUDENT EMAIL DETAILS</h2>";
while($row = mysql_fetch_array($result))
  {
?>
         <hr width="100%">
   <!--<br><br>
     <table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <th>Notification title<font color="#FF0000" >*</font> </th>
        <td><input name="ntitle" type="text" id="ename" placeholder="Title" onfocus="this.blur" readonly="true" value="<?php echo $row['title']; ?>"/></td>
    </tr>
    <tr>
      <th width="180">Description<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="32" name="ndesc" placeholder="Description"><?php echo $row['desc1']; ?></textarea></td>
    </tr>
    <tr>
      <th width="124">Date<font color="#FF0000">*</font></th>
      <td align=left><table><tr><td><input value="<?php echo $row['lastdate']; ?>" placeholder="YYYY-MM-DD" type="text" value="" id="dob" name="edate" size="12"></td><td><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td></tr></table></td>
    </tr>
    <tr>
      <th>Contacts<font color="#FF0000">*</font></th>
      <td><textarea rows="8" cols="32" name="contacts" placeholder="Contacts"><?php echo $row['contacts']; ?></textarea></td>
    </tr>
    <tr><td>&nbsp;</td>
        <td><input type="submit" name="submit" value="add Notification"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="reset" value="Clear" /></td>
    </tr>
  </table>-->
  Notification Title:
  <input type="text" id="pagename" name="title" onfocus="this.blur" readonly="true" value="<?php echo $row['title']; ?>">
  Date:
  <input placeholder="YYYY-MM-DD" type="text" id="pagekey" value="<?php echo $row['lastdate']; ?>" name="date1" size="12"><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
 <!-- <input name="3" type="text" id="pagekey" value="">
  <table><tr><td><input placeholder="YYYY-MM-DD" type="text" id="pagekey" value="<?php echo $row['date1']; ?>" name="3" size="12"></td><td><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td></tr></table>-->
  <p>Description:</p>
  <textarea name="desc1" cols="120" rows="12" id="pagecont"><?php echo $row['desc1']; ?></textarea>
  <p>Contacts</p>
  <textarea name="contacts" cols="120" rows="8" id="pagecont"><?php echo $row['contacts']; ?></textarea>
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
 $title=clean($_POST['title']);
 $date1=clean($_POST['date1']);
 $contacts=clean($_POST['contacts']);
 $desc1=clean($_POST['desc1']);
//echo"<script>alert('$title')</script> ";
    if($title==''||$date1==''||$contacts=='')
    {
        echo "<script>
            alert('Please Fill all the details!!!');
           header('location:notifications.php')
            </script> ";
    }
    else
        {
    include 'connect_db.php';
    $query="update notifications SET lastdate='$date1',desc1='$desc1',contacts='$contacts' where title='$title'";
    trim($query);
    $query=stripcslashes($query);
    $query_html=htmlspecialchars($query);
    $result=mysql_query($query);
    $row=mysql_affected_rows();
    if(!$row)
    {
        echo "<script>
            alert('Update failed try Again!!!');
          header('location:notifications.php')
            </script> ";
    }
    else
        {
        echo "<script>";
        echo "alert('Notification is updated successfully updated');
            header('location:notifications.php')
            </script> ";
    }
}}
?>
</body>
</html>