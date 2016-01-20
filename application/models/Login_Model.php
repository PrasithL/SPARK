<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* @author: Prasith Lakshan
	*/
	class Login_Model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function validate_login($username, $password)
		{	
			// retrieve the record matching the parameters from the database
			$result = $this->db->get_where('users', array('username' => $username, 'password' => $password));

			if ($result->num_rows() === 1) {
				$row = $result->row();
				

				return true;
			} 

			return false;
		}


	}

?>