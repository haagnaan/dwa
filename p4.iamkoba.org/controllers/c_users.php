<?php

class users_controller extends base_controller {


		public function __construct() {
			parent::__construct();
			}


/*-------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------*/
		public function signup() {

		# Set up template
			$this->template->content = View::instance("v_users_signup");
			$this->template->title = "Signup";
			
		#load CSS / JS files to Validate
		$client_files = Array(
			"/js/validate.js",
			"/css/validate.css"
			);
		
			
		# Render the template
		echo $this->template;
		}

		


/*-------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------*/
		public function p_signup() {

		# What data was submitted
			//print_r($_POST);
			
			
		# Encrypt password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Create and encrypt token
		# Store current timestamp
		$_POST['created'] = Time::now(); # This returns the current timestamp
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

		# Insert this into the database (added this line based on class example 12/13/12)
		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
		
		#added this on 1112012
		$token = $_POST['token'];
		@setcookie('token', $token, strtotime('-1 week'), '/');
		
		// add an if statement here
		
		
		#send user(s) back to login page to re-login
		
		// load the view 

// and echo the page view

		Router::redirect("/users/login");
		

		}


/*-------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------*/
		public function login($error = NULL) {

			# Load the template
			$this->template->content = View::instance("v_users_login");
			$this->template->title	 = "Login";	
				
			# Pass data to the view
			$this->template->content->error = $error;
						
			# Render the template
			echo $this->template;
			
			
			}


/*-------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------*/
		public function p_login() {

			# Prevent SQL injection attacks
			//$_POST = DB::instance(DB_NAME)->sanitize($_POST);

			# Encrypt the password
			$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

			# Look for a matching email and password in the DB - retrieve token if we find it
			$q = "SELECT token
				FROM users
				WHERE email = '".$_POST['email']."'
				AND password = '".$_POST['password']."'";
	
			$token = DB::instance(DB_NAME)->select_field($q);

			# Login failed
			if(!$token) {
				Router::redirect("/users/login/error");
				
				echo "Users must register to login";
				
			}
			# Login passwed
			else {
			setcookie("token", $token, strtotime('+2 weeks'), '/');
			# Send user to login in page
			Router::redirect("/");
				}

			}

			


/*-------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------*/
			public function logout() {

				# Generate and save a new token for next login
				$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

				# Create the data array we'll use with the update method
				# In this case, we're only updating one field, so our array only has one entry
				$data = Array("token" => $new_token);

				# Do the update
				DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

				# Delete their token cookie - effectively logging them out
				setcookie("token", "", strtotime('-1 year'), '/');

				echo "You have been logged out.";
				# ADDED THIS ON 1112012 TO REDIRECT USERS TO THE SIGNON PAGE
				Router::redirect('/');
				
				}


/*-------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------*/
			public function profile() {

				# Not logged in (not sure of this code
				if(!$this->user) {
					echo "Members only. <a href='/users/login/'>Please login.</a>";
					return;
				}

				# Logged in
				if($user_name == NULL) {
						echo "You did not specify a user";
					} 
						else {

				# Setup the view
					$this->template->content = View::instance("v_users_profile");
						$this->template->title = "Profile for ".$user_name;

				# Don't need to pass any variables to the view because all we need is $user and that's already set globally in c_base.php

				# Render the view
				echo $this->template;

					}	
			}

}