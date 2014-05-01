
<?php include 'header.php';
      include 'connect_db.php';
?>
<div>
<div class="gradientBoxesWithOuterShadows" id="leftpart">
    <p align="center"><font class="notefont">Notifications</font></p>
<?php
$sql = "SELECT nid,title,added_on from notifications order by added_on";
$result = mysql_query($sql);
if(!$result)
{
	echo 'The notifications could not be displayed or No notifications found, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'No Notifications defined yet.';
	}
	else
	{
		//prepare the table
		echo '<table border="0">
			  <tr>
				<th></th>
                         </tr>';?>
                <?php
		while($row = mysql_fetch_assoc($result))
		{
			echo '<tr>';
				echo '<td>';?>
                                <?php
					echo '<marquee onmouseover="this.stop();" onmouseout="this.start();" scrollamount="2" height="40px" direction="up"><h4><a href="category.php?id=' . $row['nid'] . '">'. date('d-m-Y', strtotime($row['added_on'])) .' ' . $row['title'] . '</a></h4>';
                                echo '</td> </marquee>';
                }?><?php
        }
}
?>  </div>
        <div id="sliderFrame">
        <div id="slider">
            <img src="slider_images/scan0018.jpg" alt="JSS Kannada Medium School"/>
            <img src="slider_images/scan0012.jpg" alt="Welcome to JSS School Dharwad"/>
            <img src="slider_images/scan0009.jpg" height="200px" alt="Celebration Of Traditional day" />
            <img src="slider_images/scan0010.jpg" height="200px" alt="Celebration Of Traditional day"/>
            <img src="slider_images/scan0013.jpg" alt="School Exhibition" />
            <img src="slider_images/scan0016.jpg" alt="Celebration Of karnataka Rajyostava" />
            <img src="slider_images/scan0017.jpg" alt="Celebration Of karnataka Rajyostava" />
        </div>

        </div>
</div>
