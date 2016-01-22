<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* @author: Prasith Lakshan
	*
	* This model handles CRUD operations of the 'users' table in the DB
	*/
	class Users_Model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		/**
		 * @param  username
		 * @param  password
		 * @return boolean 'true' if credentials are valid, if not 'false'
		 */
		public function validate_login($username, $password)
		{	
			// retrieve the record matching the parameters from the database
			$result = $this->db->get_where('users', array('username' => $username, 'password' => $password));

			// if the row count equals one it means a user record does exist.
			// so the user is good to go.
			if ($result->num_rows() === 1) {
				return true;
			} 

			return false;
		}


	}

?>