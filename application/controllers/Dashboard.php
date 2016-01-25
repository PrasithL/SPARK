<?php

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* @author: Prasith Lakshan
	*/
	class Dashboard extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			// check if logged in
			$this->check_login();
		}

		public function index($values = NULL)
		{
			// loading the page
			$this->load->view("header");
			$this->load->view('dashboard_view');
			$this->load->view("footer");
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
		 *	Destroys the current session and logs the user out.
		 *
		 * @return null
		 */
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('index.php/Login');
		}

	}

?>
