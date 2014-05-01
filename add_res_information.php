<?php include 'header.php';
      include 'connect_db.php';
?>
<html>
    <head>
    </head>
    <body>
        <div class="adres">
        <form method="post" action="">
            <h3 align="center">Resource Managament</h3>
            <br><br>
     <table width="500" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
        <th>Your School Name:<font color="#FF0000" >*</font> </th>
        <td><input name="stitle" type="text" id="stitle" placeholder="School Title" size="50pt"/></td>
    </tr>
    <tr>
      <th width="180">Contact Details:<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="82" name="scontact" placeholder="Contact details"></textarea></td>
    </tr>
    <tr>
      <th width="180">About your school:<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="82" name="saboutus" placeholder="About school"></textarea></td>
    </tr>
    <tr>
      <th width="180">History of your school:<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="82" name="shistory" placeholder="School history"></textarea></td>
    </tr>
    <tr>
      <th width="180">Mission and vision of institution:<font color="#FF0000">*</font></th>
      <td width="168"><textarea rows="8" cols="82" name="smission" placeholder="Mission and vision"></textarea></td>
    </tr>
    <tr>
      <th width="180">Staff details:<font color="#FF0000"></font></th>
      <td width="168"><textarea rows="8" cols="82" name="sdetails" placeholder="Staff details"></textarea></td>
    </tr>
    <tr>
      <th width="180">Student Achievements:<font color="#FF0000"></font></th>
      <td width="168"><textarea rows="8" cols="82" name="sachieve" placeholder="Student achievements"></textarea></td>
    </tr>
    <tr>
      <th width="180">Sports Activities:<font color="#FF0000"></font></th>
      <td width="168"><textarea rows="8" cols="82" name="sactivity" placeholder="Sports Activities"></textarea></td>
    </tr>
    <tr><td>&nbsp;</td>
        <td><input type="submit" name="submit" value="Add Resource Details"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="reset" value="Clear" /></td>
    </tr>
  </table>
             
 </form>
            </div>

<?php
 if(isset($_POST['submit']))
{
include 'connect_db.php';
// username and password sent from form
 $stitle=$_POST['stitle'];
 $contact=$_POST['scontact'];
 $about=$_POST['saboutus'];
 $history=$_POST['shistory'];
 $mission=$_POST['smission'];
 $staffs=$_POST['sdetails'];
 $studachieve=$_POST['sachieve'];
 $sports=$_POST['sactivity'];

 //echo $stitle.$contact.$about.$history.$mission.$staffs.$studachieve.$sports;
if($stitle==''||$contact==''||$about==''||$history==''||$mission=='')
 {
     echo '<script>alert("Mandatory Fields can\'t be left blank");</script>';
 }
 else
 {
$sql="update resource SET school_title='$stitle',contacts='$contact',about='$about',history='$history',mission='$mission',staff='$staffs',stud_achievements='$studachieve',sports='$sports' where SID='1'";
//$sql="insert resource values('$stitle','$contact','$about','$history','$mission','$staffs','$studachieve','$sports')";
$result=mysql_query($sql);
$aff=mysql_affected_rows();
if($result)
{
     echo "<script>
alert('Your Resource is updated');
</script>";
 }
 else
     {
 echo "<script>
alert('Something went wrong please try again later!!');
window.location.href='add_res_information.php';
</script>";
}
 }
}
 ?>
  </body>
</html>
