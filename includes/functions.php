<?php
$key = "mhbjhjhjkjjkogjrbg093ti";

function generate_user_id($theemail){
  echo " id is ".'fhgbje343'.$theemail;
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

    $data = base64_decode($data);

    $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');

    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = ord($data[$len-1]);

    return substr($data, 0, strlen($data) - $pad);
}


//function to upload profile picture
function upload_user_profile_picture(){
  $profile_picture = null;
  if(isset($_FILES['profile_picture'])){
        //file types allowed
        $types_allowed = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

        $size_allowed = 1024;//tamanho maximo em bytes
        
        // the original name of the file
        $file_name = $_FILES['profile_picture']['name'];
        
        // type of the file, example "image/gif"
        $file_type = $_FILES['profile_picture']['type'];
        
        // The size of the file in bytes
        $file_Size = $_FILES['profile_picture']['size'];
        
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
            else{
              //work here
              // read file as blob
             $fp = fopen($file_temp, 'r');

             $profile_picture = fread($fp, filesize($file_temp));

             //$profile_picture = addslashes($profile_picture);

             fclose($fp);    
            }
        }  
  }
  return $file_temp; // return profile_picture as a blob
}

//function to set user sessions
function set_user_sessions($user_details){
$_SESSION['user_name'] = CONCAT($user_details['user_firstname'].' '.$user_details['user_lastname']);
}

//function to send simple email
function send_email(){
  if(isset($_POST['sign_up_email'])){
    $email = $_POST['sign_up_email'];
    $message = $_POST['sign_up_message'];

    $to = $email;
    //define the subject of the email
    $subject = 'Welcome for Before&After '.$_SESSION['job']; 
    //define the message to be sent.
    $message = 'Go to this link and activate'; 
    //define the headers we want passed
    $headers = 'From: '.$_POST['email'];

    //send the email
    if(mail( $to, $subject, $message, $headers )){
    //email sent
     }

  }
}

//function to process login information when user wants to sign in
function process_sign_in($controller, $homepage){
  if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
   $sign_in_email = $_POST['user_email'];
   $sign_in_password = $_POST['user_password'];
   if ($controller->sign_in($sign_in_email, $sign_in_password) == true) {
     include($homepage);
     exit();
   }else{
    echo "Wrong details please try again";
   }
}
}

//function to process sign up
function process_sign_up($controller, $sign_up_confirmation_page){
  if (isset($_POST['signup_email']) && isset($_POST['signup_password']) &&
 isset($_POST['signup_firstname']) && isset($_POST['signup_lastname'])) {
    //upload pciture here
  $user_photo = upload_user_profile_picture();
if ($user_photo == null) {
  echo "Picture not uploaded";
  exit();
}
  $user_firstname = $_POST['signup_firstname'];
  $user_email = $_POST['signup_email'];
  $user_password = $_POST['signup_password'];
  $user_lastname = $_POST['signup_lastname'];

  if($controller->user_control->user->add_user($controller->connect->dbc, generate_user_id($user_email),
   $user_firstname, $user_lastname, $user_email, $user_password, $user_photo) == true){
    
    echo "Sign up successful, send email by now";
    include($sign_up_confirmation_page);
    exit();
  }else{
    echo "Sign up unsuccessful!";
  }
  

 /*if($controller->sign_up($user_firstname, $user_lastname, $user_email, $user_password, $user_photo) == true){
    echo "Sign up successful, send email by now";
    include($sign_up_confirmation_page);
    exit();
  }else{
    echo "Sign up unsuccessful";
  }*/
}
}

?>





              

    

