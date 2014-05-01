<?php
include 'header.php';
include 'connect_db.php';
$sql = "SELECT contacts from resource";
$result = mysql_query($sql);
if(!$result)
{
	echo 'The notifications could not be displayed or No notifications found, please try again later.';
}
else
{
    $row=mysql_fetch_array($result);
}
?>
<div class="adcontact">
    <h1 align="center">Contact us</h1>
    <hr width="90%">
    <div>
        <?php echo $row['contacts'];?>
    </div>
    <br><br>
</div>
   