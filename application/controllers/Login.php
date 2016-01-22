<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($msg = null)
	{
		$data['msg'] = $msg;
		$this->load->view('login_view', $data);
	}

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
}
