<?
public function profile() {

	# If user is blank, they're not logged in, show message and don't do anything else
	if(!$this->user) {
		echo "Members only. <a href='/users/login'>Login</a>";
		
		# Return will force this method to exit here - none of the rest of the code will execute
		return false;
	}
	
	# Setup view
	$this->template->content = View::instance('v_users_profile');
	$this->template->title   = "Profile of".$this->user->first_name;
		
	# Render template
	echo $this->template;
}
