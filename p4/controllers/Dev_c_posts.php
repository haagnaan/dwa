<?php

class posts_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
		}
		
	}
	public function index() {
	
	# Set up view
	$this->template->content = View::instance('v_posts_index');
	$this->template->title   = "Posts";
	
	# Build a query of the users this user is following - we're only interested in their posts
	$q = "SELECT * 
		FROM users_users
		WHERE user_id = ".$this->user->user_id;
	
	# Execute our query, storing the results in a variable $connections
	$connections = DB::instance(DB_NAME)->select_rows($q);
	
	# In order to query for the posts we need, we're going to need a string of user id's, separated by commas
	# To create this, loop through our connections array
	$connections_string = "";
	foreach($connections as $k => $v) {
		$connections_string .= $connections['user_id_followed'].",";
	}
	
	# Remove the final comma 
	$connections_string = substr($connections_string, 0, -1);
	
	# Connections string example: 10,7,8 (where the numbers are the user_ids of who this user is following)

	# Now, lets build our query to grab the posts
	# ADDED THIS FROM FORUM
			$q="";
				if(!empty($connection_string)){
				$q = "SELECT*
					FROM posts
					JOIN users USING (user_id)
						WHERE posts.user_id IN (".$connections_string.")"; # This is where we use that string of user_ids we created
						}
						else {
								$q = "SELECT * 
								FROM posts 
								JOIN users USING (user_id)
								WHERE user_id = ".$this->user->user_id;
								}
				
	# Run our query, store the results in the variable $posts
	$posts = DB::instance(DB_NAME)->select_rows($q);
	
	# Pass data to the view
	$this->template->content->show_no_post_message = TRUE; #ADD this part of SUSAN'S ex in the forum on 10/29 as a followup to davebaines question regarding "but what id there are no friends to follow..."
	
	
	# Render view
	echo $this->template;
	
	

	public function users() {

	# Set up the view
	$this->template->content = View::instance("v_posts_users");
	$this->template->title   = "Users";
	
	# Build our query to get all the users
	$q = "SELECT *
		FROM users";
		
	# Execute the query to get all the users. Store the result array in the variable $users
	$users = DB::instance(DB_NAME)->select_rows($q);
	
	# Build our query to figure out what connections does this user already have? I.e. who are they following
	$q = "SELECT * 
		FROM users_users
		WHERE user_id = ".$this->user->user_id;
		
	# Execute this query with the select_array method
	# select_array will return our results in an array and use the "users_id_followed" field as the index.
	# This will come in handy when we get to the view
	# Store our results (an array) in the variable $connections
	$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
		
		echo Dedug::dump($connestions, "connections");

		
	# Pass data (users and connections) to the view
	$this->template->content->users       = $users;
	$this->template->content->connections = $connections;

	# Render the view
	echo $this->template;
	}

	public function follow($user_id_followed = NULL) {
		
	# Prepare our data array to be inserted
	$data = Array(
		"created" => Time::now(),
		"user_id" => $this->user->user_id,
		"user_id_followed" => $user_id_followed
		);
	
	# Do the insert
	DB::instance(DB_NAME)->insert('users_users', $data);

	# Send them back
	Router::redirect("/posts/users");

}

public function unfollow($user_id_followed = NULL) {

	# Delete this connection
	$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
	DB::instance(DB_NAME)->delete('users_users', $where_condition);
	
	# Send them back
	Router::redirect("/posts/users");

}

	public function add() {
	
		# Setup view
		$this->template->content = View::instance('v_posts_add');
		$this->template->title   = "Add a new post";
			
		# Render template
		echo $this->template;
	
	}
	
	public function p_add() {
			
		# Associate this post with this user
		$_POST['user_id']  = $this->user->user_id;
		
		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['user_id']  = $this->user->user_id;
		
		# Insert
		DB::instance(DB_NAME)->insert('posts', $_POST);
		
		# Quick and dirty feedback
		echo "Your post has been added. <a href='/posts/add'>Add another?</a>";
		
		}
			
}