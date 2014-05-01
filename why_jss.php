<?php
include 'header.php';
include 'connect_db.php';
$sql = "SELECT about from resource";
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
       <h1 align="center">About JSS</h1>
       <hr width="90%">
       <div class="contacth2">
        <?php echo $row['about'];?>
    </div>
    </div>
<pre>
    <br><br>
 

<!--
Welcome to The JSS School! We're glad you're here.

In 1924, Shree JSS established school based on a simple, yet powerful, principle: trust. By trusting her students and giving them freedom to take
responsibility for learning, she provided the basis for critical thinking, future success, and meaningful contribution to their communities.

Today, nearly 90 years later, The JSS School maintains the principles and vision of our founder, balancing the fundamentals of learning with a progressive,
experiential education.As the oldest K-12 independent coeducational day school in the city of Seattle, we at JSS take great pride in the unique quality of
our learning environment. Each year, we enroll about 570 girls and boys in Kindergarten through Twelfth Grade. Small class sizes and our committed faculty
make the educational experience at JSS one that stays with students forever. Our alumnae/i and their parents can attest to the unique value of a JSS education.
We provide the skills needed to gain acceptance to college and, fulfilling our most vital promise, to lead a productive and meaningful life.

We hope you enjoy your visit and, if you have a question or comment about The JSS School, please share it with us.

If you need more information, please call us at 0836-2233389. For admissions information, please visit our admissions pages.

Rajani Das

Head of School-->
</pre>
    <br /><br /><br />
</div>
