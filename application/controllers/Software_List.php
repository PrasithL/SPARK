<?php

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class software_list extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			// check if logged in
			$this->check_login();
		}

		public function index()
		{
			$this->load->model("Software_List_Model");

			$data['softwares'] = $this->Software_List_Model->get_all_softwares();
			// if the flash data is set insert it into the 'data' array
			// this flash data is set in add_user()
			if (null !== $this->session->flashdata('result')) {
				$data['result'] = $this->session->flashdata('result');
			}

			// loading the page
			$this->load->view("header");
			$this->load->view('software_list_view', $data);
			$this->load->view("footer");
		}

		public function add_softwares()
			{
			$data 	= $this->input->post();

			// load model and invoke the function
			$this->load->model("Software_List_Model");
			$result = $this->Software_List_Model->add_softwares($data);

			// reload the page with result
			$this->session->set_flashdata('result', $result);
			redirect('index.php/software_list');
			}

		public function edit_software()
		{
			$data 	= $this->input->post();

			$this->load->model("Software_List_Model");
			$edit_result = $this->Software_List_Model->edit_software($data);

			// reload the page with result
			$this->session->set_flashdata('edit_result', $edit_result);
			redirect('index.php/software_list');
		}


		public function delete_software()
		{
			$id 	= $this->input->post('id');
			
			$this->load->model("Software_List_Model");
			$edit_result = $this->Software_List_Model->delete_software($id);

			// reload the page with result
			$this->session->set_flashdata('edit_result', $edit_result);
			redirect('index.php/software_list');

		}
		
		private function check_login()
			{
			if ( !$this->session->userdata('username'))
			 	{
				$this->session->set_flashdata('msg', 'You have to login first!');
				redirect('index.php/Login');
				}
			}
	}
?>
