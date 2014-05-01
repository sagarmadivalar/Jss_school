<?php
include 'header.php';
require 'connect_db.php';
?>
<html>
    <head>
        <title>Registration Form</title>
        <!--<link rel="STYLESHEET" type="text/css" href="/style/register.css" />-->
        <link rel="STYLESHEET" type="text/css" href="style/register.css" />

    </head>
    <body bgcolor="antiquewhite">
        <div class="adreg">
       <?php
if (array_key_exists('submit',$_POST)){
	 $expected = array('name', 'age', 'preAddr', 'perAddr', 'city', 'state','pin', 'phone', 'mobile','email', 'sname','dob', 'std', 'pstd', 'psname','nationality','relegion','caste','category');
	$required = array('name', 'age', 'preAddr', 'perAddr', 'city', 'state','pin', 'phone', 'mobile','email', 'sname','dob', 'std', 'pstd', 'psname','caste');
	$errors = array();
        $validation = array();
	foreach ($_POST as $field => $value){
		$temp = is_array($value) ? $value : trim($value);
		if (empty($temp) && in_array($field, $required)) {
			array_push($errors, $field);
		}
	}
	if (empty($errors)){?>
		<?php
		unset($errors);
	}
}
?>

<div id="page">
    <form id="appform" method="post">
    <fieldset><legend>Application Form</legend>
        <h2>Parent Details</h2><hr />
        <div class='short_explanation'>* required fields</div>
	 <div class='container'>
            <label for="name"> Parent Name*:</label><br />
	<input name="name" id="name" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['name']).'"'; } ?>
         />
        <?php if (isset($errors) && in_array('name', $errors)){?>
	<div class="red">Please enter name</div>
	<?php } ?>
        <?php
        $val=preg_match('/[a-z]/', $_POST['name']);
        if($val==0 && $_POST['name']!= null) {
array_push($validation, $_POST['name']) ?>
        <div class="red">Please Enter character only.</div>
        <?php } ?>
         </div>
                 <div class="container">
            <label for='preAddr' >Present Address*: </label><br />
                   <input name="preAddr" id="preAddr" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['preAddr']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('preAddr', $errors)){?>
	<div class="red">Please enter present Address</div>
	<?php } ?>
                 </div>
                <div class="container">
            <label for='perAddr' >Permanent Address*: </label><br />
                   <input name="perAddr" id="perAddr" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['perAddr']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('perAddr', $errors)){?>
	<div class="red">Please enter permanent Address</div>
	<?php } ?>
                </div>
                <div class="container">
            <label for='city' >City*: </label><br />
                   <input name="city" id="city" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['city']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('city', $errors)){?>
	<div class="red">Please enter City name</div>
	<?php } ?>
                </div>
                 <div class="container">
            <label for='state' >State*: </label><br />
                   <input name="state" id="state" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['state']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('state', $errors)){?>
	<div class="red">Please enter state</div>
	<?php } ?>
                </div>
                 <div class="container">
            <label for='pin' >PIN*: </label><br />
                   <input name="pin" id="pin" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['pin']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('pin', $errors)){?>
	<div class="red">Please enter PIN number</div>
	<?php } ?>
         <?php if(! preg_match('/^[0-9]{6}$/', $_POST['pin']) && $_POST['pin']!= null) {
             array_push($validation, $_POST['pin'])?>
        <div class="red">Invalid PIN</div>
        <?php } ?>
                </div>

                 <div class="container">
            <label for='nationality' >Nationality*: </label><br />
            <select name="nationality" class="one">
                       <option value="1">select</option>
                       <option>INDIAN</option>
                       <option>Others</option>
                   </select><br />
                 </div>
        <div class="container">
            <label for='relegion' >Relegion*: </label><br />
            <select name="relegion" class="one">
                       <option value="1">select</option>
                       <option>HINDU</option>
                       <option>MUSLIM</option>
                       <option>SIKH</option>
                       <option>CHRISTH</option>
                       <option>Others</option>
                   </select><br />
                </div>
         <div class="container">
            <label for='caste' >Caste*: </label><br />
                   <input name="caste" id="caste" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['caste']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('caste', $errors)){?>
	<div class="red">Please enter Caste Name</div>
	<?php } ?>
        <?php
        $val=preg_match('/[a-z]/', $_POST['caste']);
        if($val==0 && $_POST['caste']!= null) {
array_push($validation, $_POST['caste']) ?>
        <div class="red">Invalid Caste Name.</div>
        <?php } ?>
                </div>
        <div class="container">
            <label for='category' >Category*: </label><br />
            <select name="category" id="category" class="one"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['category']).'"'; } ?>]
        <option value="1">select</option>
                       <option>GM</option>
                       <option>C1</option>
                       <option>2A</option>
                       <option>2B</option
                       <option>3A</option>
                       <option>3B</option>
                        <option>SC</option>
                       <option>ST</option>
        </select>
        </div>
        <div class="container">
            <label for='phone' >Phone NO*: </label><br />
                   <input name="phone" id="phone" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['phone']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('phone', $errors)){?>
	<div class="red">Please enter Phone No</div>
	<?php } ?>
         <?php if(! preg_match('/^[0-9]{11}$/', $_POST['phone']) && $_POST['phone']!= null) {
             array_push($validation, $_POST['phone'])?>
        <div class="red">Invalid Phone Number</div>
        <?php } ?>
                </div>
         <div class="container">
            <label for='mobile' >MobileNO*: </label><br />
                   <input name="mobile" id="mobile" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['mobile']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('mobile', $errors)){?>
	<div class="red">Please enter MObile No</div>
	<?php } ?>
         <?php if(! preg_match('/[+91]?[0-9]{10}/', $_POST['mobile']) && $_POST['mobile']!= null) {
             array_push($validation, $_POST['mobile'])?>
        <div class="red">Invalid Mobile Number</div>
        <?php } ?>
                </div>
        <div class="container">
            <label for='email' >Email Id*: </label><br />
                   <input name="email" id="email" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['email']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('email', $errors)){?>
	<div class="red">Please Enter Email Id</div>
	<?php } ?>
      <?php if(! preg_match('/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/', $_POST['email']) && $_POST['email']!= null) {
          array_push($validation, $_POST['email'])?>
        <div class="red">Invalid Email Id</div>
        <?php } ?>
                </div>
                <br /><br />
                <hr /><h2>Student Details</h2><hr /><br />
                <div class="container">
            <label for='sname' >Student Name*: </label><br />
                   <input name="sname" id="sname" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['sname']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('sname', $errors)){?>
	<div class="red">Please Enter Student Name</div>
	<?php } ?>
         <?php
        $val=preg_match('/[a-z]/', $_POST['sname']);
        if($val==0 && $_POST['sname']!= null) {
        array_push($validation, $_POST['sname']) ?>
        <div class="red">Please Enter character only.</div>
        <?php } ?>
                </div>
                 <div class="container">
            <label for='dob' >Date Of Birth(yyyy-mm-dd)*: </label><br />
                   <input name="dob" id="dob" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['dob']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('dob', $errors)){?>
	<div class="red">Please Enter Date Of Birth</div>
	<?php } ?>
         <?php
        $val=preg_match('/^[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}$/', $_POST['dob']);
        if($val==0 && $_POST['dob']!= null) {
        array_push($validation, $_POST['dob']) ?>
        <div class="red">Invalid DOB.</div>
        <?php } ?>
                </div>
               <div class="container">
            <label for='std' >Standard*: </label><br />
                   <input name="std" id="std" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['std']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('std', $errors)){?>
	<div class="red">Please Enter Standard</div>
	<?php } ?>
                </div>
                <div class="container">
            <label for='pstd' >Previous Standard*: </label><br />
                   <input name="pstd" id="pstd" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['pstd']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('pstd', $errors)){?>
	<div class="red">Please Enter Previous Standard</div>
	<?php } ?>
                </div>
                <div class="container">
            <label for='psname' >Previous School Name*: </label><br />
                   <input name="psname" id="psname" type="text"
	<?php if (isset($errors)) { echo 'value="'.htmlentities($_POST['psname']).'"'; } ?>
	/><br />
        <?php if (isset($errors) && in_array('psname', $errors)){?>
	<div class="red">Please Enter Previous School Name</div>
	<?php } ?>
                </div>
                <table border="2">
                    <tr>
                        <th>subject</th>
                        <th>Max.Marks</th>
                        <th>Marks<br />obtained</th>
                        <th>Result</th>
                    </tr>
                    <tr>
                        <th>Language1</th>
                        <th><input type="text" name="max1" class="one" value="100" onfocus="this.blur()" align="center"></th>
                        <th><input type="text" name="lan1" class="one"></th>
                        <th><select name="result1">
                                <option>Pass</option>
                                <option>Fail</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Language2</th>
                        <th><input type="text" name="max2" class="one" value="100" onfocus="this.blur()" align="center"></th>
                        <th><input type="text" name="lan2" class="one"></th>
                        <th><select name="result2">
                                <option>Pass</option>
                                <option>Fail</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Language3</th>
                        <th><input type="text" name="max3" class="one" value="100" onfocus="this.blur()" align="center"></th>
                        <th><input type="text" name="lan3" class="one"></th>
                        <th><select name="result3">
                                <option>Pass</option>
                                <option>Fail</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Mathematics</th>
                        <th><input type="text" name="max4" class="one" value="100" onfocus="this.blur()" align="center"></th>
                        <th><input type="text" name="maths" class="one"></th>
                        <th><select name="result4">
                                <option>Pass</option>
                                <option>Fail</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Science</th>
                        <th><input type="text" name="max5" class="one" value="100" onfocus="this.blur()" align="center"></th>
                        <th><input type="text" name="sci" class="one"></th>
                        <th><select name="result5">
                                <option>Pass</option>
                                <option>Fail</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Social</th>
                        <th><input type="text" name="max6" class="one" value="100" onfocus="this.blur()" align="center"></th>
                        <th><input type="text" name="soc" class="one"></th>
                        <th><select name="result6">
                                <option>Pass</option>
                                <option>Fail</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th colspan="2" align="center">Total</th>
                        <td colspan="2"><input type="text" name="total" class="two"></td>
                    </tr>
                     <tr>
                        <th colspan="2" align="center">Percentage</th>
                        <td colspan="2"><input type="text" name="percent" class="two"></td>
                    </tr>
                </table>
	<p>
            <input name="submit" id="submit" type="submit" value="Submit"  />
	</p>
        </fieldset>
</form>
</div>
<br /><br /><br />
</div>
</body>
</html>
<?php
if(array_key_exists('submit', $_POST) && empty ($errors) &&empty ($validation))
        {
    $name = $_POST["name"];
        $appName = $_POST["sname"];
        $age = $_POST["age"];
        $preAddr = $_POST["preAddr"];
        $perAddr = $_POST["perAddr"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $pin = $_POST["pin"];
        $nationality = $_POST["nationality"];
        $relegion = $_POST["relegion"];
        $caste = $_POST["caste"];
        $category = $_POST["category"];
        $phone = $_POST["phone"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];

        $dob = $_POST["dob"];
        $std = $_POST["std"];
        $pstd = $_POST["pstd"];
        $psname = $_POST["psname"];

        $lan1 = $_POST["lan1"];
        $lan2 = $_POST["lan2"];
        $lan3 = $_POST["lan3"];
        $maths = $_POST["maths"];
        $sci = $_POST["sci"];
        $soc = $_POST["soc"];

        $result1 = $_POST["result1"];
        $result2 = $_POST["result2"];
        $result3 = $_POST["result3"];
        $result4 = $_POST["result4"];
        $result5 = $_POST["result5"];
        $result6 = $_POST["result6"];

        $reg=rand(1000, 9999);

        $res=random($reg);
        $que="insert into registration(rid,name,father_name,pre_address,per_address,city,state,pin,nationality,religion,caste,category,phone_no,mobile_no,email_id,DOB,std,prev_std,prev_school,lang1,lang2,lang3,maths,science,social)values('$res','$appName','$name','$preAddr','$perAddr','$city','$state','$pin','$nationality','$relegion','$caste','$category','$phone','$mobile','$email','$dob','$std','$pstd','$psname','$lan1','$lan2','$lan3','$maths','$sci','$soc');";
        $query_result=mysql_query($que);
        if(!$query_result)
            {
            print "Error In Query!".mysql_error();
            exit();
        }
        $rid="Applicant#;:;".$res."\n";
        $appName="Applicant Name;:;".$appName."\n";
        $name="Father Name;:;".$name."\n";
        $preAddr="Present Address;:;".$preAddr."\n";
        $perAddr="Permanent Address;:;".$perAddr."\n";
        $city="City;:;".$city."\n";
        $state="State;:;".$state."\n";
        $pin="PIN;:;".$pin."\n";
        $nationality="Nationality;:;".$nationality."\n";
        $relegion="Relegion;:;".$relegion."\n";
        $caste="Caste;:;".$caste."\n";
        $category="Category;:;".$category."\n";
        $phone="Phone No;:;".$phone."\n";
        $mobile="Mobile NO;:;".$mobile."\n";
        $email="Email Id;:;".$email."\n";

         $dob="Date Of Birth;:;".$dob."\n";
         $std="Standard;:;".$std."\n";
         $pstd="previous Std;:;".$pstd."\n";
         $psname="previous School Name and marks;:;".$psname."\n";

         $result1="Language1;100;".$lan1.";".$result1."\n";
         $result2="Language2;100;".$lan2.";".$result2."\n";
         $result3="Language3;100;".$lan3.";".$result3."\n";
         $result4="Mathematics;100;".$maths.";".$result4."\n";
         $result5="Science;100;".$sci.";".$result5."\n";
         $result6="Social;100;".$soc.";".$result6."\n";


$myFile = "countries.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
//$stringData = "Floppy Jalopy\n";

fwrite($fh, $rid);
fwrite($fh, $appName);
fwrite($fh, $name);
fwrite($fh, $preAddr);
fwrite($fh, $perAddr);
fwrite($fh, $city);
fwrite($fh, $state);
fwrite($fh, $pin);
fwrite($fh, $nationality);
fwrite($fh, $relegion);
fwrite($fh, $caste);
fwrite($fh, $category);
fwrite($fh, $phone);
fwrite($fh, $mobile);
fwrite($fh, $email);
fwrite($fh, $branch);
fwrite($fh, $dob);
fwrite($fh, $std);
fwrite($fh, $pstd);
fwrite($fh, $psname);

$marks="marks.txt";
$marks_details=fopen($marks, 'w') or die("can't open");

fwrite($marks_details, $result1);
fwrite($marks_details, $result2);
fwrite($marks_details, $result3);
fwrite($marks_details, $result4);
fwrite($marks_details, $result5);
fwrite($marks_details, $result6);

fclose($fh);
fclose($marks_details);
?>
<script type="text/javascript">
    window.location="ex.php";
</script>
<?php
}
?>
<?php
function random($reg)
{
    $q1="select rid from registration where rid='$reg';";
    $r1=mysql_query($q1);
 if($r1==1)
 {
    $reg=rand(1000,9999);
    random($reg);
 }
 else
 {
    return $reg;
 }
}
?>