<?php

//key for encryption
$key = "mhbjhjhjkjjkogjrbg093ti";

//function to generate id
function generate_user_id($theemail){
  return 'fhgbje343'.$theemail;
}




//function to encrypt
function encrypt($data, $secret)
{
    //Generate a key from a hash
    $key = md5(utf8_encode($secret), true);

    //Take first 8 bytes of $key and append them to the end of $key.
    $key .= substr($key, 0, 8);

    //Pad for PKCS7
    $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = $blockSize - ($len % $blockSize);
    $data .= str_repeat(chr($pad), $pad);

    //Encrypt data
    $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');

    return base64_encode($encData);
}




//function to decrypt
function decrypt($data, $secret)
{
    //Generate a key from a hash
    $key = md5(utf8_encode($secret), true);

    //Take first 8 bytes of $key and append them to the end of $key.
    $key .= substr($key, 0, 8);

<<<<<<< HEAD
    //$data = base64_decode($data);

    $data = mcrypt_decrypt('tripledes', $key, base64_decode($data), 'ecb');
=======
    $data = base64_decode($data);

    $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316

    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = ord($data[$len-1]);

    return substr($data, 0, strlen($data) - $pad);
}




//function to upload profile picture
function upload_user_profile_picture(){
<<<<<<< HEAD
  //$profile_picture = null;
=======
  $profile_picture = null;
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316
  if(isset($_FILES['profile_picture'])){
        //file types allowed
        $types_allowed = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

        //$size_allowed = 1024;//tamanho maximo em bytes
        
        // the original name of the file
<<<<<<< HEAD
        //$file_name = $_FILES['profile_picture']['name'];
=======
        $file_name = $_FILES['profile_picture']['name'];
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316
        
        // type of the file, example "image/gif"
        $file_type = $_FILES['profile_picture']['type'];
        
        // The size of the file in bytes
<<<<<<< HEAD
        //$file_Size = $_FILES['profile_picture']['size'];
=======
        $file_Size = $_FILES['profile_picture']['size'];
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316
        
        // the temp name of the file
        $file_temp = $_FILES['profile_picture']['tmp_name'];
        
        // the error code
        $file_error = $_FILES['profile_picture']['error'];
        
        if($file_error == 0){
            //verify the type
            if(array_search($file_type, $types_allowed)== false){
                echo 'The type of the file is incorrect';
                exit();
            }
            //verify the size of the file here later
            /*else if($file_size > $size_allowed){
                echo 'The file size is not allowed'; 
                exit();
            }*/
        }  
        //return temporary address of picture
  return $file_temp;
  }
}



//function to set user sessions
function set_user_sessions($user_details){
$_SESSION['user_name'] = CONCAT($user_details['user_firstname'].' '.$user_details['user_lastname']);
}


<<<<<<< HEAD
//function to send simple email
function send_email($to, $subject, $message, $user_id, $bandaemail){
    //link for activation
    $activation_link = "http://banda.cloworkonline.webege.com/?info=";
    $email_status = false;
    //define the message to be sent.
    $message = 'Go to this link and activate. '.$activation_link.''.$user_id; 
    //define the headers we want passed
    $headers = 'From: '.$bandaemail;
=======


//function to send simple email
function send_email_asfter_signup($to, $subject, $message, $user_id, $bandfemail){
    $email_status = false;
    //define the message to be sent.
    $message = 'Go to this link and activate'.'some link...'; 
    //define the headers we want passed
    $headers = 'From: '.$bandfemail;
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316

    //send the email
    if(mail( $to, $subject, $message, $headers )){
      $email_status = true;
     }
     return $email_status;
}


<<<<<<< HEAD
=======


>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316
//function to process login information when user wants to sign in
function process_sign_in($controller, $homepage){
  //check if details ahave been posted
  if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
    //store posted details into variables
   $sign_in_email = $_POST['user_email'];
   $sign_in_password = $_POST['user_password'];
   // check if user is in our database -- returns true if user exists, and false if otherwise
   if ($controller->sign_in($sign_in_email, $sign_in_password) == true) {
    //if user details are correct, send user to homepage
     include($homepage);
     exit();
     }
     //if user details are wrong
     else{
         // A way to alert user sign in failed
         echo "Wrong details please try again";
    }
  }
}


<<<<<<< HEAD
=======


>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316
//function to process sign up
function process_sign_up($controller, $sign_up_confirmation_page){
  if (isset($_POST['signup_email']) && isset($_POST['signup_password']) &&
 isset($_POST['signup_firstname']) && isset($_POST['signup_lastname'])) {
    //upload pciture here
  $user_photo = upload_user_profile_picture();
//if picture upload fails
if ($user_photo == null) {
  //a way to prompt user
  echo "Picture not uploaded";
  exit();
}
 //store posted result into variables
  $user_firstname = $_POST['signup_firstname'];
  $user_email = $_POST['signup_email'];
  $user_password = $_POST['signup_password'];
  $user_lastname = $_POST['signup_lastname'];
  
  /*Try adding user to database
  if it fails, retuns false, otherwise returns true*/
    $user_id = generate_user_id($user_email);
  if($controller->user_control->user->add_user($controller->connect->dbc, generate_user_id($user_email),
   $user_firstname, $user_lastname, $user_email, $user_password, $user_photo) == true){
    //alert user sign up was successful
<<<<<<< HEAD
    $email_sent = false;
     if(send_email($user_email, 'Welcome to B&A', 'You are now on BandA,
      follow link to confirm', $user_id, 'clowork@gmail.com')){
      $email_status = true;
    }

    //send user to successful sign up confirmation page
    $_SESSION['user_email'] = $user_email;
=======
    echo "Sign up successful, send email by now";
    $email_sent = false;
    $count = 0;
    while($email_sent == false && $count < 10){
     if(send_email_asfter_signup($user_email, 'Welcome to B&F', 'You are now on BandF,
      follow link to confirm', $user_id, 'clowork@gmail.com') == true){
      $email_status = true;
     }
     $count++;
    }
    //send user to successful sign up confirmation page
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316
    include($sign_up_confirmation_page);
    exit();
  }else{
    //alert user sign up was unsuccessful
    echo "Sign up unsuccessful!";
  }
  
}
}

<<<<<<< HEAD

function reset_password($user_email){
    $user_email = encrypt($user_email, $key);
    //take email address from the user
    if(isset($_POST['forgotten_password_email'])){
        send_email($email, "Forgotten your B&F passpword?", "Click the link to reset your password: http://localhost/banda/change_password?email=$user_email", $user_id, $bandaemail);
    }
    //send email to user with :: email should contain link the user can click to access page to update password
    
 
}
=======
?>
>>>>>>> 3c8403677d2e56f148b817ded17491f048b37316





              

    

