<?php

//Add all controllers :  controllers have instance of class models
include('controllers/controller.php');

//a single instance of controller to manage program
$control  = new Controller();
$homepage = 'home.php';
//signin retunring user
signin_returning_user($control, $homepage, 'index.php');
//process sign in here
process_sign_in($control, $homepage);
//process sign up here
process_sign_up($control, 'signup_confirm.php');
//activate users for their first time of usage
confirm_activation($control, $homepage);

?>