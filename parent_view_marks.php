<?php
session_start();
include 'header.php';
?>
<html>
    <head>
        <style type="text/css">
            h1
            {
                text-decoration: underline;
            }
            table{
                margin-top: 40px;
                text-align: left;
            }


            .box1
            {
                margin-left: 550px;
                margin-top: 100px;
                border:solid;
                height:250;
                width: 500;
            }
            .fnt
            {
                font-size: 30px;
}

        </style>
    </head>
    <body>
        <div class="adcontact">
             <a href="parent_home.php"><button class="btn">Parent Home</button></a><br><br>
            <div class="center1">
        <form name="f1" action="" method="POST">
            <h1>VIEW MARKS</h1>
            <table align="center">
                <tr>
                <th align="left">Registration Number</th>
                <th></th>
                <th></th>
                <th><input type="text" value="" name="regno"></th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
             <tr>
                <th align="left">Tests</th>
                <th></th>
                <th></th>
                <th><select name="tests">
                <option>Unit Test 1</option>
                <option>Unit Test 2</option>
                <option>Semester End Exam</option>
            </select></th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <th></th>
                <th align="left"></th>
                <th></th>
                <th></th>
            </tr>
            </table>
            <input type="submit" value="submit" name="submit" class="btn">
        </form>
            </div>
        </div>
<?php
// Make a MySQL Connection
include 'connect_db.php';

// Get all the data from the "example" table
if(isset ($_POST['submit']))
    {
    $tests=$_POST['tests'];
$regno=$_POST['regno'];
if($regno=='')
    {
     echo "<script>
            alert('Please Fill the details!!');
            </script> ";
}
else{
$result = mysql_query("SELECT english,kannada,hindi,maths,science,sstudies,totalscore,totalmarks,percentage from marks m,student s where m.tname='$tests' and s.reg='$regno' and s.rollno=m.rollno;") or die(mysql_error());
while($row = mysql_fetch_array($result))
  {


?>
        <div class="adcontact">
             <div class="center1">
                 <h1>MARKS DETAILS</h1>
        <table align="center">
            <tr>
                <th>ENGLISH:</th>
                <th><input name="pagename" type="text" id="pagename" value="<?php echo $row['english']; ?>"></th>
            </tr>
            <tr>
                <th> KANNADA:</th>
                <th><input name="pagekey" type="text" id="pagekey" value="<?php echo $row['kannada']; ?>"></th>
            </tr>
            <tr>
                <th> HINDI:</th>
                <th><input name="pagename" type="text" id="pagename" value="<?php echo $row['hindi']; ?>"></th>
            </tr>
            <tr>
                <th>MATHEMETICS:</th>
                <th><input name="pagekey" type="text" id="pagekey" value="<?php echo $row['maths']; ?>"></th>
            </tr>
            <tr>
                <th>SCIENCE:</th>
                <th><input name="pagename" type="text" id="pagename" value="<?php echo $row['science']; ?>"></th>
            </tr>
            <tr>
                <th>SOCIAL SCIENCE:</th>
                <th><input name="pagekey" type="text" id="pagekey" value="<?php echo $row['sstudies']; ?>"></th>
            </tr>
            <tr>
                <th>MARKS SCORED:</th>
                <th><input name="pagekey" type="text" id="pagekey" value="<?php echo $row['totalscore']; ?>"></th>
            </tr>
            <tr>
                <th>TOTAL MARKS:</th>
                <th><input name="pagekey" type="text" id="pagekey" value="<?php echo $row['totalmarks']; ?>"></th>
            </tr>
            <tr>
                <th>PERCENTAGE:</th>
                <th><input name="pagekey" type="text" id="pagekey" value="<?php echo $row['percentage']; ?>"></th>
            </tr>
        </table>
             </div></div>

    <?php
    
        $eng1="English;:;".$row['english']."\n";
        $kan1="Kannada;:;".$row['kannada']."\n";
        $hin1="Hindi;:;".$row['hindi']."\n";
        $mat1="Mathemetics;:;".$row['maths']."\n";
        $sci1="Science;:;".$row['science']."\n";
        $ssc1="Social Science;:;".$row['sstudies']."\n";
        $tsc1="Marks Scored;:;".$row['totalscore']."\n";
        $tma1="Total Marks;:;".$row['totalmarks']."\n";
        $per1="Percentage;:;".$row['percentage']."\n";
         $myFile = "m1.txt";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $eng1);
        fwrite($fh, $kan1);
        fwrite($fh, $hin1);
        fwrite($fh, $mat1);
        fwrite($fh, $sci1);
        fwrite($fh, $ssc1);
        fwrite($fh, $tsc1);
        fwrite($fh, $tma1);
        fwrite($fh, $per1);
        $_SESSION['marks']=$row['totalmarks'];
        ?>
       <script type="text/javascript">
    //window.open('ex.php','_newtab');
    //window.location="home.php";
   // for(i=0;i<3000;i++);
    window.location="marks_pdf.php";
     
</script>
        <?php
  }
}
}
?>

</body>
</html>