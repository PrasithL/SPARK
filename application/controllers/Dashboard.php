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
			$this->check_login();
		}

		public function index($values = NULL)
		{
			$this->load->view("header");
			$this->load->view('dashboard_view');
			$this->load->view("footer");
		}

		private function check_login()
		{
			if ( !$this->session->userdata('username')) {
				$this->session->set_flashdata('msg', 'You have to login first!');
				redirect('index.php/Login');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('index.php/Login');
		}
		
	}

?>