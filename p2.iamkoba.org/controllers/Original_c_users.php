<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		
	} 
	
	public function index() {
		echo "Welcome to the users's department";
	}
	
	public function signup() {
	
		# SETUP VIEW
			$this->template->content = View::instance("v_users_signup");
			$this->template->title   = "Signup";
			
		# Render Template
		echo $this->template;
	}

	public function p_signup() {
	# Dump out the results of POST to see what the form submitted
		 print_r($_POST);
		 
		 $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		 $_POST['created'] = Time::now(); # adds the time user is created ( this returns the surrent timestamp
		 $_POST['modified'] = Time::now();
		 
		 $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		echo "You're signed up";
	
			}
		
	public function login($error = NULL) {
	
		# Set up the view
		$this->template->content = View::instance("v_users_login");
	
		# Pass data to the view
		$this->template->content->error = $error;
	
		# Render the view
		echo $this->template;
		
	# Setup view
		$this->template->content = View::instance('v_users_login');
		$this->template->title   = "Login";
		
	# Render template
		echo $this->template;
	}
	
	public function p_login() {
	
	
	# [...irrelevant code redacted...]
			
	# Login failed
	if($token == "") {
		Router::redirect("/users/login/error"); # Note the addition of the parameter "error"
	}
	# Login passwed
	else {
		setcookie("token", $token, strtotime('+2 weeks'), '/');
		Router::redirect("/");
	}

	#Prevent SQL injection attacks
	$_POST =DB::instance(DB_NAME)->sanitize($_POST);
		
	# Hash submitted password so we can compare it against one in the db
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
	# Search the db for this email and password
	# Retrieve the token if it's available
	$q = "SELECT token 
		FROM users 
		WHERE email = '".$_POST['email']."' 
		AND password = '".$_POST['password']."'";
	
	$token = DB::instance(DB_NAME)->select_field($q);	

	# If we didn't get a token back, login failed
	if(!$token == "") {
			
		# Send them back to the login page
		Router::redirect("/users/login/");
		
	# But if we did, login succeeded! 
	} else {
			
		# Store this token in a cookie
			setcookie("token", $token, strtotime('+2 weeks'), '/');
		
		# Send them to the main page - or whever you want them to go
		Router::redirect("/");
					
	}

}
		
	public function logout() {
	# Generate and save a new token for next login
	$new_token = sha1(TOKEN_SALT.$email.Utils::generate_random_string());
	
	# Create the data array we'll use with the update method
	# In this case, we're only updating one field, so our array only has one entry
	$data = Array("token" => $new_token);
	
	# Do the update
	DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$token."'");
	
	# Delete their token cookie - effectively logging them out
	setcookie("token", "", strtotime('-1 year'), '/');
	
	# added this on 10/25/12 10am
	# Send user(s)/Them back to the main landing page
	Router::redirect("/");
	
		echo "You have been logged out";
	}
			
public function profile($user_name = NULL) {
	# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
		echo "Members only. <a href='/users/login'>Login</a>";
		
	# Return will force this method to exit here so the rest of 
	# the code won't be executed and the profile view won't be displayed.
		return false;
					}
		echo $this->user->first_name;
		
		if($user_name == NULL){
				echo "You did not specify a user";
				}
					else {
	# Set up view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile for".$user_name;
		
	#	Render Template
		echo $this->template;
		}

	# Load CSS / JS Setting up client files
		$client_files = Array(
				"/css/koba.css",
				"/js/users.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);   

	# Pass information to the view
		$this->template->content->user_name = $user_name;
			
	# Render template
		echo $this->template;
			
	}
}