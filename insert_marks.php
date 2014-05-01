<?php
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
                height:400;
                width: 500;
                border: solid;
            }

        </style>
     </head>
    <body>
        <div class="adcontact">
            <a href="admin_home.php"><button class="btn">Admin Home</button></a><br><br>
            <div class="center1">
            <h1 align="center">MARKS DETAILS</h1><br/><br/>
            <hr width="30%">
         
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
            </tr>

        </table>

        <table align="center">
            <tr>
                <th align="left">Total Marks</th>
                <th></th>
                <th></th>
                <th><input type="text" name="total" value=""></th>
            </tr>
            <tr>
            <th align="left">Roll No. </th>
                <th></th>
                <th></th>
                <th><select name="roll">
            <?php
            for($i=1;$i<=80;$i++)
            echo"<option>$i</option>";
            ?>
        </select></th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
             <tr>
                <th align="left">English</th>
                <th></th>
                <th></th>
                <th><input type="text" name="eng" value=""></th>
            </tr>
            <tr>
                <th align="left">Kannada</th>
                <th></th>
                <th></th>
                <th><input type="text" name="kan" value=""></th>
            </tr>
            <tr>
                <th align="left">Hindi</th>
                <th></th>
                <th></th>
                <th><input type="text" name="hin" value=""></th>
            </tr>
            <tr>
                <th align="left">Mathematics</th>
                <th></th>
                <th></th>
                <th><input type="text" name="mat" value=""></th>
            </tr>
            <tr>
                <th align="left">Science</th>
                <th></th>
                <th></th>
                <th><input type="text" name="sci" value=""></th>
            </tr>
            <tr>
                <th align="left">Social Science</th>
                <th></th>
                <th></th>
                <th><input type="text" name="ssci" value=""></th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr> <th align="right"><input type="Submit" value="Submit" name="submit" ></th>
                <th></th>
                <th></th>
                <th align="left"><input type="button"  value="Next" name="Next"></th>
            </tr>
        </table>
        </form>
            </div>
        </div>
<?php
if(isset ($_POST['submit']))
{
         include 'connect_db.php';
         $class=$_POST["class"];
         $sec=$_POST["sec"];
         $tests=$_POST["test2"];
         $totalmarks=$_POST["total"];
         $rollno=$_POST["roll"];
         $eng=$_POST["eng"];
         $kan=$_POST["kan"];
         $hin=$_POST["hin"];
         $mat=$_POST["mat"];
         $sci=$_POST["sci"];
	 $ssc=$_POST["ssci"];
         if($eng==''||$kan==''||$hin==''||$mat==''||$sci==''||$ssci=='')
    {
        echo "<script>
            alert('Please Fill all the details!!!');
           header('location:insert_marks.php')
            </script> ";
    }
    else{
         //echo "$sec";
        // echo "$rollno";
         $totalscored=$eng+ $kan + $hin + $mat + $sci + $ssc;
        // echo "$totalscored";
        $percent=($totalscored*100)/($totalmarks);
         $percent=round($percent,2);
        // echo "$percent";

	//$query="insert into test1 values('$tests','$rollno')";
	//$res=mysql_query($query);
         $q="Select reg from student where class='$class' and rollno='$rollno' and sec='$sec';";
         $r=mysql_query($q);
         while($row=mysql_fetch_array($r))
{
         $reg=$row['reg'];
}
//echo"$reg";
         $que="insert into marks(english,kannada,hindi,maths,science,sstudies,totalscore,totalmarks,percentage,rollno,tname,class,division,regno) values('$eng','$kan','$hin','$mat','$sci','$ssc','$totalscored','$totalmarks','$percent','$rollno','$tests','$class','$sec','$reg');";
         $res1=mysql_query($que);
         if($res1)
         {
          echo '<script> alert("Hello added");</script>';
         }
         else
         {
                        echo '<script> window.open(\"close.html\") </script>';
         }


    }
}
    ?>
</body>
</html>

