<?php

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* @author: Prasith Lakshan
	*/
	class User_Management extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			// check if logged in
			$this->check_login();
		}

		public function index()
		{
			$this->load->model("Users_Model");

			$data['users'] = $this->Users_Model->get_active_users();
			// if the flash data is set insert it into the 'data' array
			// this flash data is set in add_user()
			if (null !== $this->session->flashdata('result')) {
				$data['result'] = $this->session->flashdata('result');
			}

			// loading the page
			$this->load->view("header");
			$this->load->view('user_management_view', $data);
			$this->load->view("footer");
		}

		public function add_user()
		{
			$emp_id 	= $this->input->post("emp_id");
			$username 	= $this->input->post("username");
			$password	= $this->input->post("password");

			// load model and invoke the function
			$this->load->model("Users_Model");
			$result 	= $this->Users_Model->add_user($emp_id, $username, $password);

			// reload the page with result
			$this->session->set_flashdata('result', $result);
			redirect('index.php/User_Management');
		}

		/**
		 * Checks if user is logged in by looking at session data.
		 * if user is not logged in, redirects to the login page.
		 *
		 * @return null
		 */
		private function check_login()
		{
			if ( !$this->session->userdata('username')) {
				$this->session->set_flashdata('msg', 'You have to login first!');
				redirect('index.php/Login');
			}
		}

		/**
		 * Disable the user record by marking it as disabled
		 *
		 * @param null
		 **/
		public function disable_user()
		{
			$emp_id	= $this->input->post('emp_id');

			$this->load->model("Users_Model");
			$this->Users_Model->disable_user($emp_id);

			redirect('index.php/User_Management');
		}

		/**
		 * Disable the user record by marking it as disabled
		 *
		 * @param null
		 **/
		public function enable_user()
		{
			$emp_id	= $this->input->post('emp_id');

			$this->load->model("Users_Model");
			$this->Users_Model->enable_user($emp_id);

			redirect('index.php/User_Management');
		}

		/**
		 * Update the password of a user
		 *
		 * @param null
		 **/
		public function change_password()
		{
			$emp_id		= $this->input->post('modal_emp_id');
			$password	= $this->input->post("new_password_show");

			$this->load->model("Users_Model");
			$this->Users_Model->change_password($emp_id, $password);

			redirect('index.php/User_Management');
		}

	}

?>
