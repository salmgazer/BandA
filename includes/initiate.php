<?php

//Add all controllers :  controllers have instance of class models
include('controllers/controller.php');

//a single instance of controller to manage program
$control  = new Controller();

//process sign in here
process_sign_in($control, 'home.php');
//process sign up here
process_sign_up($control, 'signup_confirm.php');

?>