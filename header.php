<?php
include 'connect_db.php';
$sql = "SELECT school_title from resource";
$result = mysql_query($sql);
if(!$result)
{
	echo 'Contact Admin for resource.';
}
else
{
    $row=mysql_fetch_array($result);
}
?>
<html>
<head><style>
    .my{ margin-left: 1150px}</style>
<div id="google_translate_element" class="my"></div>
<script>
function googleTranslateElementInit() {
new google.translate.TranslateElement(
{
pageLanguage: 'en'
}, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <meta charset="UTF-8">
	<title><?php echo $row['school_title'];?>|Home</title>
	<link rel="stylesheet" href="fancydropdown.css"><!--this is for menu-->
        <!--below are for sliding images-->
          <link href="slider_files/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="slider_files/js-image-slider.js" type="text/javascript"></script>
    <link href="slider_files/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="slider_files/tooltip.js" type="text/javascript"></script>
    <script type="text/javascript" src="fancydropdown.js"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='images/thumb" + (thumbIndex + 1) + ".jpg' style='width:70px;height:44px;' />"; });
    </script>
</head>
<body>
    <div class="gradientBoxesWithOuterShadows" id="heading" align="center"><img src="images/logo.jpg" alt="logo"/><h1><?php echo $row['school_title'];?></h1></div>
<div id="menu">
<ul class="tabs">
    <li><h4><a href="home.php">Home &raquo;</a></h4></li>
	<li class="hasmore"><a href="#"><span>About us</span></a>
		<ul class="dropdown">
                    <li><a href="why_jss.php">Why JSS?</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="directions.php">Directions</a></li>
                        <li><a href="mission.php">Mission,Vision</a></li>
                        <li class="last"><a href="staff_dir.php">Staff Directory</a></li>
		</ul>
	</li>
	<li class="hasmore"><a href="#"><span>Curriculam</span></a>
		<ul class="dropdown">
			<li><a href="#">Student Achievements</a></li>
			<li><a href="#">Sports Activities</a></li>
			<!--<li><a href="#">Topic 3</a></li>
			<li class="last"><a href="#">Topic 4</a></li>-->
		</ul>
	</li>
	<li class="hasmore"><a href="#"><span>Admissions</span></a>
		<ul class="dropdown">
                    <li><a href="application_procedure.php">Application Procedure</a></li>
			<!--<li><a href="#">Student Eligibility</a></li>-->
                        <li><a href="register1.php">Registration</a></li>
                        <li><a href="fee_struct.php">Fees Structure</a></li>
		<!--	<li class="last"><a href="#">See more&hellip;</a></li>-->
		</ul>
	</li>
        <li class="hasmore"><a href="#"><span>Portal Login</span></a>
		<ul class="dropdown">
                    <li><a href="parent_login.php">Parent Login</a></li>
                        <li><a href="admin_login.php">Admin Login</a></li>
		</ul>
	</li>
        <li><a href="disp_events.php"><span>Events</span></a>
	</li>
        <li><a href="contact_us.php"><span>Contact us</span></a></li>
</ul>
</div>
</body>
</html>
