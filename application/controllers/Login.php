<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://SPARK/
	 *	- or -
	 * 		http://SPARK/index.php/Login/index
	 *	
	 *
	 * @param Error message to show if login failed
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($msg = null)
	{
		$this->check_login();
		$data['msg'] = $msg;
		$this->load->view('login_view', $data);
	}

	/**
	 * Data submitted from Login form in login_view.php is captured here and 
	 * validate against the DB records to redirect the user according to the result
	 * 
	 * @return null
	 */
	public function validate_login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$this->load->model("Users_Model");
		$result = $this->Users_Model->validate_login($username, $password);

		if ($result) {
			// set session data
			$data = array(
						'username' => $username
					);
			$this->session->set_userdata($data);
			// forward to dashboard
			redirect("index.php/Dashboard");
		} else {
			$msg = 'Invalid username and/or password.';
			$this->index($msg);
		}
	}

	/**
		 * Checks if user is logged in by looking at session data.
		 * if user is already logged in, redirects to the home page
		 * 
		 * @return null
		 */
		private function check_login()
		{
			if ( $this->session->userdata('username')) {
				redirect('index.php/Dashboard');
			}
		}
}
