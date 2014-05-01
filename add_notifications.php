
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
            <h3 align="center">Add Notification</h3>
            <br><br>
     <table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <th>Notification title<font color="#FF0000" >*</font> </th>
      <td><input name="ntitle" type="text" id="ename" placeholder="Title"/></td>
    </tr>
    <tr>
      <th width="180">Description<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="32" name="ndesc" placeholder="Description"></textarea></td>
    </tr>
    <tr>
      <th width="124">Date<font color="#FF0000">*</font></th>
      <td align=left><table><tr><td><input placeholder="YYYY-MM-DD" type="text" value="" id="dob" name="edate" size="12"></td><td><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td></tr></table></td>
    </tr>
    <tr>
      <th>Contacts<font color="#FF0000">*</font></th>
      <td><textarea rows="8" cols="32" name="contacts" placeholder="Contacts"></textarea></td>
    </tr>
    <tr><td>&nbsp;</td>
        <td><input type="submit" name="submit" value="add Notification"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="reset" value="Clear" /></td>
    </tr>
  </table>
        </form>
  
<?php
 if(isset($_POST['submit']))
{

include 'connect_db.php';
// username and password sent from form
 $title=$_POST['ntitle'];
 $desc=$_POST['ndesc'];
 $ndate=$_POST['edate'];
 $contacts=$_POST['contacts'];

if(empty($title)==true)
 {
     echo "<script>
alert('Mandatory fields can't be left blank');
window.location.href='add_Notifications.php';
</script>";
 }
 else
 {

$sql="insert into notifications values(' ','$title','$desc','$ndate',now(),'$contacts')";
$result=mysql_query($sql);
 $aff=mysql_affected_rows();
if($result)
{
     echo "<script>
alert('Notification is added');
</script>";
 }
 else
     {
 echo "<script>
alert('Something went wrong please try again later!!');
window.location.href='add_Notifications.php';
</script>";
}
 }
}

?>
  </body>
</html>
