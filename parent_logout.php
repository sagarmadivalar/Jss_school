<?php
include 'header.php';
session_start();
/*
 *  * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($_SESSION['parent_signed_in'] == true)
{
	//unset all variables
	$_SESSION['parent_signed_in'] = NULL;
        $_SESSION['SESS_MEMBER_NAME']=NULL;
}?>
<br><br>
<div class="adlogout">
    <p align="center"><img align="center" src="images/logout.png" height="100px" width="200px" alt="Image error"></p>
<h3 align="center">You have Successfully Logged out<a href="parent_login.php"> click here </a> to Login.</h3>
</div>
