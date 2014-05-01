<?php
include 'header.php';
?>
<html>
    <head>
        <style type="text/css">
           #align
           {
               margin-left: 150px;
}
        </style>
    </head>
    <body>
        <div class="adview">
             <a href="admin_home.php"><button class="btn">Admin Home</button></a><br><br>
            <div class="center1">
        <h1 align="center">VIEW STUDENT INFORMATION</h1><br /><br/>
        <hr width="60%">
        
        <form name="f1" action="disp.php" method="POST">
            <table align="center">
            <tr>
                <th align="left">Please Enter a valid Registration Number</th>
                <th></th>
                <th></th>
                <th><input type="text" value="" name="rid"></th>
            </tr>
            <tr>
                <th></th>
                <th align="left"></th>
                <th></th>
                <th></th>
            </tr>
            </table><br><br>
            <input type="submit" value="submit" name="submit" class="btn" id="align">
        </form>
        </div>
        </div>
</body>
</html>