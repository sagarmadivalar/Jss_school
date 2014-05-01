<?php
session_start();
include 'header.php';
?>
<html>
    <head>
        <title>Staff</title>
        <style type="text/css">
            h1
            {
                text-decoration: underline;
            }
            table{
                margin-top: 40px;
            }


            .box1
            {
                margin-left: 350px;
                margin-top: 100px;
}

        </style>
     </head>
    <body>
        <div class="adcontact">
             <a href="admin_home.php"><button class="btn">Admin Home</button></a><br><br>
            <div class="center2">
            <h1 align="center">UPDATE STUDENT MARKS DETAILS</h1>
            <hr width="60%">
        
<form name="f1" method="POST" action="">
<table align="center">
            <tr>
                <th align="left">Class</th>
                <td></td>
                <td></td>
                <td></td>

                <td><select name="class" >
                        <option>select</option>
                 <option>1</option>
             <option>2</option>
             <option>3</option>
              <option>4</option>
               <option>5</option>
                <option>6</option>
                 <option>7</option>
                    </select>
                </td>
             <td></td>
                <td></td>
                <td></td>
                <th align="left">Division</th>
                <td></td>
                <td></td>
                <td></td>
                <td><select name="sec">
                          <option>select</option>
            <option value="A">A</option>
            <option value="B">B</option>
                    </select>
             </td>
                 <td></td>
                <td></td>
                <td></td>
                <th align="left">Test</th>
                <td></td>
                <td></td>
                <td></td>
                <td><select name="test2">
                          <option>select</option>
                          <option>Unit Test 1</option>
                           <option>Unit Test 2</option>
                            <option>Semester End Exam</option>
        </select></td>
            <th align="left">Roll No. </th>
                <th></th>
                <th></th>
               <th>
                  
            <?php
            include 'connect_db.php';
$query = mysql_query("select rollno from marks;"); // Run your query

echo '<select name="roll" OnChange="f1.submit()"> <option value="-1">Select</option>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['rollno'].'">'.$row['rollno'].'</option>';
}
echo '</select>';// Close your drop down box
?>   </th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </table>
</form>


<?php

error_reporting(E_ERROR | E_PARSE);

include 'connect_db.php';
$roll=$_POST['roll'];
$class=$_POST['class'];
$div=$_POST['sec'];
$tests=$_POST['test2'];

$result = mysql_query("SELECT english,kannada,hindi,maths,science,sstudies from marks where rollno='$roll' and class='$class' and division='$div';") or die(mysql_error());
trim($query);
$query=stripcslashes($query);
$query_html=htmlspecialchars($query);
while($row = mysql_fetch_array($result))
  {
?>
 </table>
           
        <form method="POST">
 <table align="center">
     <tr>
                <th align="left">Roll No</th>
                <th></th>
                <th></th>
                <th><input type="text" name="sess_roll" value="<?php echo $roll; ?>" onfocus="this.blur();"></th>
            </tr>
            <tr>
                <th align="left">Class</th>
                <th></th>
                <th></th>
                <th><input type="text" name="sess_class" value="<?php echo $class; ?>" onfocus="this.blur();"></th>
            </tr>
            <tr>
                <th align="left">Division</th>
                <th></th>
                <th></th>
                <th><input type="text" name="sess_div" value="<?php echo $div; ?>" onfocus="this.blur();"></th>
            </tr>
            <tr>
                <th align="left">Test</th>
                <th></th>
                <th></th>
                <th><input type="text" name="sess_test" value="<?php echo $tests; ?>" onfocus="this.blur();"></th>
            </tr>
          <tr>
                <th align="left">English</th>
                <th></th>
                <th></th>
                <th><input type="text" name="eng" value="<?php echo $row['english']; ?>"></th>
            </tr>
            <tr>
                <th align="left">Kannada</th>
                <th></th>
                <th></th>
                <th><input type="text" name="kan" value="<?php echo $row['kannada']; ?>"></th>
            </tr>
            <tr>
                <th align="left">Hindi</th>
                <th></th>
                <th></th>
                <th><input type="text" name="hin" value="<?php echo $row['hindi']; ?>"></th>
            </tr>
            <tr>
                <th align="left">Mathematics</th>
                <th></th>
                <th></th>
                <th><input type="text" name="mat" value="<?php echo $row['maths']; ?>"></th>
            </tr>
            <tr>
                <th align="left">Science</th>
                <th></th>
                <th></th>
                <th><input type="text" name="sci" value="<?php echo $row['science']; ?>"></th>
            </tr>
            <tr>
                <th align="left">Social Science</th>
                <th></th>
                <th></th>
                <th><input type="text" name="ssci" value="<?php echo $row['sstudies']; ?>"></th>
            </tr>
            <tr></tr>

            <tr></tr>
            <tr>
                <th></th>
                <th align="right"><br/><br></th>
                <th></th>
            </tr>
            
  </table>
<input type="Submit" value="Update" name="sub1" class="btn">
 <?php
 }
?>

</form>
            <?php
           // session_start();
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
if(isset($_POST['sub1']))
{
 $eng2=clean($_POST['eng']);
 $kan2=clean($_POST['kan']);
 $hin2=clean($_POST['hin']);
 $mat2=clean($_POST['mat']);
 $sci2=clean($_POST['sci']);
 $ssci2=clean($_POST['ssci']);
 $roll=$_POST['sess_roll'];
$class=$_POST['sess_class'];
$div=$_POST['sess_div'];
$tests=$_POST['sess_test'];
    if($eng2==''||$kan2==''||$hin2==''||$mat2==''||$sci2==''||$ssci2=='')
    {
        echo "<script>
            alert('Please Fill all the details!!!');
           header('location:update_marks.php')
            </script> ";
    }
    else
        {

    $query="update marks SET english='$eng2',kannada='$kan2',hindi='$hin2',maths='$mat2',science='$sci2',sstudies='$ssci2' where rollno='$roll' and class='$class' and division='$div' and tname='$tests'";
    trim($query);
    $query=stripcslashes($query);
    $query_html=htmlspecialchars($query);
    $result=mysql_query($query) or die (mysql_error());
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
        echo "alert('Marks is successfully updated');
            header('location:event_mgt.php')
            </script> ";
    }
}}
?>
  </div></div>
    </body>
</html>

