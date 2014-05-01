<?php
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

        </style>
    </head>
    <body>
        <div class="adroll">
             <a href="admin_home.php"><button class="btn">Admin Home</button></a><br><br>
         <div class="center1">
         <h1 align="center">Assigning Roll Number to students</h1>
         <hr width="60%">
        
        <form name="f1" action="" method="POST">
            <table align="center">

            <tr>
                <th align="left">Please select a class:</th>
             
                <th><select name="class1" class="btn">
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                    </select></th>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <th></th>
                
                <th align="left"><input type="submit" value="Assign" name="submit" class="btn"></th>
               
            </tr>
            </table>
        </form>
         </div>
        </div>
        <?php
       if(isset ($_POST['submit']))
           {
        require 'connect_db.php';
        $a=$b=1;
        $name1=array();
        $class=$_POST['class1'];
        if($class=='select')
            echo '<script>alert("Please select valid class.");</script>';
        else
            {
        $q="select reg, name from student where class='$class';";
        $r=mysql_query($q);      
        for($i=0;$i<mysql_num_rows($r);$i++)
        {
            $row=mysql_fetch_array($r);
            $n=$row['reg'];

        //echo "$n<br>";
	if($i%2==0)
	{
		$sec='A';
                //echo $sec;
		$roll=$a;
		$q2="update student set sec='$sec',rollno='$roll' where reg='$n';";
		$r2=mysql_query($q2);
                if(!r2)
                   echo mysql_error();
		$a++;
                //echo"i am roll no $a";
	}
	else
	{
		$sec='B';
		$roll=$b;
		$q3="update student set sec='$sec',rollno='$roll' where reg='$n';";
          
		$r3=mysql_query($q3);
                if(!r3)
                  echo mysql_error();
		$b++;

	}
}echo '<script>alert("Class roll number has been assigned.");</script>';
           }
           }
        ?>

</body>
</html>