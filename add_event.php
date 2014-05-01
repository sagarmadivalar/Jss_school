
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
            <br><br>
     <table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <th>Event name<font color="#FF0000" >*</font> </th>
      <td><input name="ename" type="text" id="ename" placeholder="Event name"/></td>
    </tr>
    <tr>
      <th width="180">Description<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="32" name="desc1" placeholder="Description"></textarea></td>
    </tr>
    <tr>
      <th width="124">Date<font color="#FF0000">*</font></th><td align=left><table><tr><td><input placeholder="YYYY-MM-DD" type="text" value="" id="dob" name="edate" size="12"></td><td><a href="javascript:NewCal('dob','YYYYMMDD')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td></tr></table></td>
    </tr>
    <tr>
      <th>Venue<font color="#FF0000">*</font></th>
      <td><input type="text" id="place" name="place" placeholder="Place"/></td>
    </tr>
    <tr>
      <th>Organisers<font color="#FF0000">*</font></th>
      <td><textarea rows="8" cols="32" name="orgs" placeholder="Organisers names"></textarea></td>
    </tr>
    <tr><td>&nbsp;</td>
        <td><input type="submit" name="submit" value="add event"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="reset" value="Clear" /></td>
    </tr>
  </table>
        </form>
  
<?php
 if(isset($_POST['submit']))
{

include 'connect_db.php';
// username and password sent from form
 $ename=$_POST['ename'];
 $edesc=$_POST['desc1'];
 $edate=$_POST['edate'];
 $eplace=$_POST['place'];
 $eorgs=$_POST['orgs'];


if(empty($ename)==true)
 {
     echo "<script>
alert('Mandatory fields can't be left blank');
window.location.href='add_event.php';
</script>";
 }
 else
 {

$sql="insert into events (eid,ename,desc1,date1,place,orgs) values(' ','$ename','$edesc','$edate','$eplace','$eorgs')";
$result=mysql_query($sql);
 $aff=mysql_affected_rows();
if($result)
{
     echo "<script>
alert('Event is added');
</script>";
 }
 else
     {
 echo "<script>
alert('Invalid Username or password');
window.location.href='add_event.php';
</script>";
}
 }
}

?>
  </body>
</html>
