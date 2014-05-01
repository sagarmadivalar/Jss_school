<?php
//category.php
include 'connect_db.php';
include 'header.php';
?>
<div class="adhome">
<?php
//first select the category based on $_GET['cat_id']
$sql = "SELECT
			title,desc1,lastdate,added_on,contacts
		FROM
			notifications
		WHERE
			nid = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
	echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This category does not exist.';
	}
	else
	{
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
                    echo '<div class="center1">';
			echo '<h2>Notification Title:&prime;' . $row['title'] .'&prime; added on &prime;'.$row['added_on'].'&prime;</h2><br />';
		
				//prepare the table
				echo '<table border="0" align="center">
					  <tr>
						<td align="left">Description</td><td>:</td><td align="left">' . $row['desc1'] . '</td></tr><tr>
						<td align="left">Contact Details</td><td>:</td><td align="left">'. $row['contacts']. '</td></tr><tr>
                                                <td align="left">Renew Date of Notification</td><td>:</td><td align="left">'.$row['lastdate'].'</td></tr>';
                                echo '</div>';
                }
		
        }
}
?>
</div>
