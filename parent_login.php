<html>
    <head>
         <link type="text/css" rel="stylesheet" href="login.css">
    </head
<?php include 'header.php';
session_start();
?>
 <div align="center" class="adhome">
    <?php  if(isset($_SESSION['parent_signed_in']) && $_SESSION['parent_signed_in'] == true)
{
     echo 'Oops!!..You are already signed in, you can <a href="parent_logout.php">sign out</a> if you want.';
     echo '<br>Click here to go to <a href="parent_home.php">Home </a>';
}
else
    {?>
            <div id="wrapper">
	<form name="login-form" class="login-form" action="" method="post">
		<div class="header">
		<h1>JSS Parent Login</h1><br>
		<span>Fill out the form below to login to site</span>
		</div>
		<div class="content">
		<input name="Aname" type="text" class="input username" placeholder="Username" />
		<div class="user-icon"></div>
		<input name="A_pwd" type="password" class="input password" placeholder="Password" />
		<div class="pass-icon"></div>
		</div>
		<div class="footer">

                <input type="reset" name="reset" value="Clear" class="button" size="20px"/>
                <input type="submit" name="submit" value="Login" class="button" size="20px"/>
		</div>
	</form>
</div>
<div class="gradient"></div>     </div>
 <?php
    }
 if(isset($_POST['submit']))
{

include 'connect_db.php';
// username and password sent from form
 $myusername=$_POST['Aname'];
 $mypassword=$_POST['A_pwd'];

if($myusername==''&& $mypassword=='')
 {
     echo "<script>
    alert('Please Enter Username and password');
    window.location.href='parent_login.php';
    </script>";

 }
 else
 {
// To protect MySQL injection (more detail about MySQL injection)
 $myusername = stripslashes($myusername);
 $mypassword = stripslashes($mypassword);
 $myusername = mysql_real_escape_string($myusername);
 $mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM parent WHERE fname='$myusername' and mobile_no='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
 $count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1)
{
                        session_regenerate_id();
			$member = mysql_fetch_assoc($result);
                        $_SESSION['parent_signed_in']=TRUE;
			$_SESSION['SESS_MEMBER_NAME'] = $member['USERNAME'];
			echo '<script>window.location="parent_home.php"</script>';
                        session_write_close();
                        
                         exit();
 }
 else
     {
 echo "<script>
alert('Invalid Username or password');
window.location.href='parent_login.php';
</script>";
 session_write_close();
}
}
$year = time() + 6000;
if($_POST['remember'])
 {
setcookie('remember_me', $_POST['uname'], $year);
}
elseif(!$_POST['remember']) {
	if(isset($_COOKIE['remember_me'])) {
		$past = time() - 100;
		setcookie(remember_me, gone, $past);
	}
}
}
?>
    </body>
</html>
