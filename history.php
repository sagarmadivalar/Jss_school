<?php
include 'header.php';
include 'connect_db.php';
$sql = "SELECT history from resource";
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
    <h1 align="center">History</h1>
    <hr width="90%">
    <div class="contacth2">
        <?php echo $row['history'];?>
    </div>
    <pre>
    <br><br>
</pre>
</div>