<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Tasks_Model extends CI_model
	{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function validate_login($username, $password)
		{
			// retrieve the record matching the parameters from the database
			$result = $this->db->get_where('users', array('username' => $username, 'password' => $password, 'status' => 'active'));

			// if the row count equals one it means a user record does exist.
			// so the user is good to go.
			if ($result->num_rows() === 1) {
				return true;
			}

			return false;
		}

		public function get_tasks()
		{
			$tasks = $this->db->get("tasks");
			return $tasks->result();
		}

		public function add_task($task_id, $task_name, $description, $priority)
		{
			$data = array(
							'task_name' => $task_id,
			        'task_name' => $task_name,
			        'description' => $description,
							'priority' => $priority,
			        'status' => 'Pending',
			        'addedby' => $this->session->userdata('username'),
							'created_date' => date("Y-m-d")
			);

			if( !$this->db->insert('tasks', $data)) {
				return -1; // error
			}

			return 1; // success
			}

		public function completed_task($task_id)
		{
			$this->db->set('status', 'done');
			$this->db->where('task_id', $task_id);
			$this->db->update('tasks');
		}

		public function pending_task($task_id)
		{
			$this->db->set('status', 'Pending');
			$this->db->where('task_id', $task_id);
			$this->db->update('tasks');
		}


		public function edit_task($task_id, $task_name, $description, $priority)
		{
			$this->db->set('task_name', $task_name);
			$this->db->set('description', $description);
			$this->db->set('priority', $priority);
			$this->db->where('task_id', $task_id);
			!$this->db->update('tasks');

			// get task details from DB
			$result = $this->db->get_where('tasks', array('task_id' => $task_id));

		}

	}

?>
