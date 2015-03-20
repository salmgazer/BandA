<?php

include('./models/model_user.php');
include_once('connect.php');
include_once('./includes/functions.php');
/**
* 
*/
class Controller_User{

	//connection to database
	var $connect;
	//Instance of user class
	var $user;




	//constructor
	function __construct(){
		//create a new instance of Connect class
		//connect class helps connect to mysql server and select database
		$this->connect =  new Connect();
		//create new instance of Model_User class
		$this->user = new Model_User();
	}



    
    //destrcutor
	function __destruct(){

	}




	//function to connect to mysql
	function connect_to_mysql(){
		//connect to mysql server
		$this->connect->connect_server();
		//return connection status :: whether connection was successful or not
		return $this->connect->connection_status;
	}




	//function to select database
	function select_database($conn, $dbname){
		//selects database
		$this->connect->pickdatabase($dbname, $this->connect->dbc);
	}




    //create an instance of user.
	function createInstance(){
		//returns an instance of a user, not yet in database
		return new Model_User();

	}




    //function to add a new user :: returns boolean
	function add_user($user_id, $user_firstname, $user_lastname, $user_email, $user_password, $user_picture){
		 if($this->user->add_user($this->connect->dbc, $user_id, $user_firstname, $user_lastname, $user_email,
		  $user_password, $user_picture) == true){
		  	$this->user->set_user_sessions();
		 	// alert user not added
		 	//add user details to session
		 }
		 else{
		 	//alert user not added
		 	//allow user to try or ask if pass is forgotten
		 }
	}




	//function to add a new user :: returns boolean - using master control
	function master_add_user($conn, $user_id, $user_firstname, $user_lastname, $user_email, $user_password, $user_picture){
		$signup_status = $this->user->add_user($conn, $user_id, $user_firstname, $user_lastname, $user_email, $user_password,
		  $user_picture);
		$this->user->set_user_sessions();
		 return ($signup_status > 0);
	}




	//function to signin
	/*function sing_in($user_email, $user_password){
		retutn $this->user->confirm_password($this->connect->dbc, $user_email, $user_password) == true);
			//add user details to session using $user_details
			//then open homepage
			//homepage is opened only when session exists
	}*/




	//function to signin using master controller
	function master_sign_in($conn, $user_email, $user_password){
        //check if user exists in the system
        //echo $this->user->confirm_password($conn, $user_email, $user_password);
        return ($this->user->confirm_password($conn, $user_email, $user_password) > 0);
	}




	//function to signout
	function sign_out(){
		session_destroy();
		include('index.php');
		//open login page
	}

}

?>