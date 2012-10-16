<?

class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	public function signup() {
		
		# Setup view
			$this->template->content = View::instance('v_users_signup');
			$this->template->title   = "Signup";
			
		# Render template
			echo $this->template;
		
	}
	
	public function p_signup() {
		
		# Dump out the results of POST to see what the form submitted
		print_r($_POST);
		
	}
		
} # end of the class