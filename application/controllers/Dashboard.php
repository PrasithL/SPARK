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
			// decided to use a seperate model to make things easier
			$this->load->model('Dashboard_Model');

			$data['room_count'] = $this->Dashboard_Model->get_active_room_count();
			$data['computer_count'] = $this->Dashboard_Model->get_active_computer_count();
			$data['issue_count'] = $this->Dashboard_Model->get_open_issue_count();
			$data['inventory_count'] = $this->Dashboard_Model->get_inventory_item_count();

			$data['issues'] = $this->Dashboard_Model->get_recent_issues();

			$data['opened_count_by_date'] = $this->Dashboard_Model->opened_issues_by_date();
			$data['closed_count_by_date'] = $this->Dashboard_Model->closed_issues_by_date();

			$data['comps_with_most_issues'] = $this->Dashboard_Model->computers_with_most_issues();

			// loading the page
			$this->load->view("header");
			$this->load->view('dashboard_view', $data);
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
