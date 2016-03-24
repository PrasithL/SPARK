<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Task_List extends CI_Controller {

	function __construct() {
		parent::__construct();
		// check if logged in
		$this->check_login();
	}

	public function index()
	{
		$this->load->model("Tasks_Model");

		$data['tasks'] = $this->Tasks_Model->get_tasks();
		// if the flash data is set insert it into the 'data' array
		// this flash data is set in add_task()
		if (null !== $this->session->flashdata('result')) {
			$data['result'] = $this->session->flashdata('result');
		}

		// loading the page
		$this->load->view("header");
		$this->load->view('task_list_view', $data);
		$this->load->view("footer");
	}

	private function check_login() {
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('msg', 'You have to login first!');
			redirect('index.php/Login');
		}
	}

	public function add_task()
	{
		$task_id = $this->input->post("task_id");
		$task_name 	= $this->input->post("task_name");
		$description 	= $this->input->post("description");
		$priority = $this->input->post("priority");

		// load model and invoke the function
		$this->load->model("Tasks_Model");
		$result 	= $this->Tasks_Model->add_task($task_id, $task_name, $description,$priority);

		redirect('index.php/Task_List');
	}

	public function completed_task()
	{
		$task_id	= $this->input->post('task_id');

		$this->load->model("Tasks_Model");
		$this->Tasks_Model->completed_task($task_id);

		redirect('index.php/Task_List');
	}

	public function pending_task()
	{
		$task_id	= $this->input->post('task_id');

		$this->load->model("Tasks_Model");
		$this->Tasks_Model->pending_task($task_id);

		redirect('index.php/Task_List');
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect('index.php/Login');
	}

	public function edit_task()
	{
		$task_id	= $this->input->post("modal_task_id");
		$task_name	= $this->input->post("modal_task_name");
		$description	= $this->input->post("modal_description");
		$priority = $this->input->post("modal_priority");

		$this->load->model("Tasks_Model");
		$edit_result = $this->Tasks_Model->edit_task($task_id, $task_name, $description, $priority);

		// reload the page with result
		$this->session->set_flashdata('edit_result', $edit_result);
		redirect('index.php/Task_List');
	}
}

?>
