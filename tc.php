<?php
session_start();
include 'header.php';
include 'connect_db.php';
?>
<html>
    <head>
    </head>
    <body>
        <div class="adcontact">
             <a href="parent_home.php"><button class="btn">Parent Home</button></a><br><br>
      <div class="center1">
        <h1 align="center">TC DETAILS</h1>
        <hr width="20%"><br/><br/>
        <form name="f1" action="" method="POST">
            <table align="center">
             <tr>
                <th align="left">Registration No.:</th>
                <th></th>
                <th></th>
                <th><input type="text" name="reg" value="" size="25"></th>
            </tr>
             <tr>
                <th align="left">Required:</th>
                <th></th>
                <th></th>
                <th><select name="tclc" class="btn">
                        <option>Select</option>
                        <option>transfer certificate</option>
                        <option>leaving certificate</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th align="left">Reason*:</th>
                <th></th>
                <th></th>
                <th><textarea rows="5" cols="20" name="reason"></textarea></th>
            </tr>
            <tr>
                <th></th>
                <th align="left"></th>
                <th></th>
                <th></th>
            </tr>
            </table><br><br>
            <input type="submit" value="submit" name="submit" class="btn">
        </form>
      </div></div>
        <?php
        if(isset ($_POST['submit']))
            {

      $reg=$_POST['reg'];
      $sel=$_POST['tclc'];
      $reason=$_POST['reason'];
      if($reg == '' || $sel == '' || $reason == '')
          echo"<script>alert(\"Mandatory Fields cannot be empty.\");</script>";
      else
          {
      $q="Select * from student where reg='$reg';";
      $r=mysql_query($q);
      $row=mysql_num_rows($r);
      if($row==1)
       {
          if($sel=='transfer certificate')
          {
            $q1="insert into tc1(reg,reason) values('$reg','$reason');";
            $r1=mysql_query($q1);
            if(!$r1)
                echo mysql_error();
            if($r1)
                {
                    $_SESSION['reg']=$reg;
                    ?>
                    <script type="text/javascript">
                    window.open('transfer.php','_newtab');
                    </script>
                     <?php
                     echo '<script>window.location="parent_home.php"</script>';
            }
            else
                {
                header("location:tc.php");
            }
          }

          elseif($sel=='leaving certificate')
              {
                $q="insert into lc1(reg,reason) values('$reg','$reason');";
                $r=mysql_query($q);
                if($r)
                {
                    $_SESSION['reg']=$reg;
                    ?>
                    <script type="text/javascript">
                    window.open('leaving.php','_newtab');
                    </script>
                     <?php
                     echo '<script>window.location="parent_home.php"</script>';
                }
                else
                {
                  header("location:tc.php");
                }
              }
             else
                 {
                 echo"<script>alert(\"sorry cannot store..\");</script>";
             }
        }
        else
            echo"<script>alert(\"Invalid Registration No..\");</script>";
            }
            }
        ?>

</body>
</html>