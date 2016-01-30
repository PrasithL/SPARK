<?php

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* @author: Prasith Lakshan
	*/
	class Room_Details extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			// check if logged in
			$this->check_login();
		}

		public function index()
		{
			$this->load->model("Room_Details_Model");

			$data['rooms'] = $this->Room_Details_Model->get_all_rooms();
			// if the flash data is set insert it into the 'data' array
			// this flash data is set in add_user()
			if (null !== $this->session->flashdata('result')) {
				$data['result'] = $this->session->flashdata('result');
			}

			// result of the password change operation
			if (null !== $this->session->flashdata('change_pass_result')) {
				$data['change_pass_result'] = $this->session->flashdata('change_pass_result');
			}

			// loading the page
			$this->load->view("header");
			$this->load->view('room_details_view', $data);
			$this->load->view("footer");
		}

		public function add_room()
		{
			$data 	= $this->input->post();

			// load model and invoke the function
			$this->load->model("Room_Details_Model");
			$result 	= $this->Room_Details_Model->add_room($data);

			// reload the page with result
			$this->session->set_flashdata('result', $result);
			redirect('index.php/Room_Details');
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
		public function disable_room()
		{
			$room_code	= $this->input->post('room_code');

			$this->load->model("Room_Details_Model");
			$this->Room_Details_Model->disable_room($room_code);

			redirect('index.php/Room_Details');
		}

		/**
		 * Disable the user record by marking it as disabled
		 *
		 * @param null
		 **/
		public function enable_room()
		{
            $room_code	= $this->input->post('room_code');

			$this->load->model("Room_Details_Model");
			$this->Room_Details_Model->enable_room($room_code);

			redirect('index.php/Room_Details');
		}

	}

?>
