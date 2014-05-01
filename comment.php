<?php
include 'header.php';
require 'connect_db.php';
if(isset($_POST['submit']))
    {
    require 'connect_db.php';
    $old=$_POST['old'];
    $new=$_POST['new'];
    $verify=$_POST['verify'];
    if($verify='verified')
        {
    $q="select name,std from registration where rid='$old';";
    $r=mysql_query($q);
    while($row=mysql_fetch_array($r))
        {
        $name=$row[0];
        $class=$row[1];
      
       }
      // echo"hello";
       //echo "$new $old $name $class";
      $q1="insert into student(reg,name,class,rid) values('$new','$name','$class','$old');";
        $r1=mysql_query($q1);
        $q2="select father_name,mobile_no,phone_no,email_id from registration where rid='$old';";
    $r2=mysql_query($q2);
    while($row=mysql_fetch_array($r2))
        {
        $fname=$row[0];
        $mob=$row[1];
        $phone=$row[2];
        $email=$row[3];
    }
    $q3="insert into parent(fname,phone_no,mobile_no,email_id,reg) values('$fname','$phone','$mob','$email','$new');";
    $r3=mysql_query($q3);
    $q4="update registration set comment='$verify' where rid='$old'";
    $r4=mysql_query($q4);
    if(!r4)
        echo mysql_error();
    else
        header("location:admin_home.php");


    }
}

?>
<html>
     <body>
         <div class="adcontact">
             <a href="admin_home.php"><button class="btn">Admin Home</button></a><br><br>
             <div class="center1">
          <h1>STUDENT DETAILS</h1><hr width='35%'><br>

<form name="f1" method="POST" action="">
         <table align="center">

            <tr>
                <th align="left">Old Reg No.</th>
                <th></th>
                <th></th>
                <th><input type="text" name="old" value=""></th>
            </tr>
            <tr>
                <th align="left">New Reg No.</th>
                <th></th>
                <th></th>
                <th><input type="text" name="new" value=""></th>
            </tr>
            <tr>
            <th align="left">Comment</th>
            <th></th>
            <th></th>
            <td><select name="verify">
                          <option>select</option>
                          <option>verified</option>
                           <option>Not verified</option>
                </select></td>
         </tr>
            <tr> <th align="right"><input type="Submit" value="Submit" name="submit" ></th>
                <th></th>
                <th></th>
               
            </tr>
        </table>
        </form>
             </div></div>
