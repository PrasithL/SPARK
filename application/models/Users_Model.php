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
		}

		/**
		 * @param  username
		 * @param  password
		 * @return boolean 'true' if credentials are valid, if not 'false'
		 */
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

		/**
		 * @return Associative array of active users
		 */
		public function get_active_users()
		{
			$users = $this->db->get("users");
			return $users->result();
		}

		/**
		 * Add a new user record
		 *
		 * This will create a new user record in the DB with today as the created date.
		 * If a record with the same employee id elready exist '0' will be returned
		 *
		 * @param employee ID
		 * @param username
		 * @param password
		 *
		 * @return 1 - user creation success
		 * @return 0 - user record with the employee id already exists
		 * @return -1 - user creation failed
		 **/
		public function add_user($emp_id, $username, $password)
		{
			$result = $this->db->get_where("users", array('emp_id' => $emp_id));
			if ($result->num_rows() != 0) {
				return 0; // record already exists
			} else {
				$data = array(
				        'emp_id' => $emp_id,
				        'username' => $username,
				        'password' => $password,
						'status'   => 'active',
						'created_date' => date("Y-m-d")
				);

				if( !$this->db->insert('users', $data)) {
					return -1; // error
				}

				return 1; // success
			}
		}

		public function disable_user($emp_id)
		{
			$this->db->set('status', 'disabled');
			$this->db->where('emp_id', $emp_id);
			$this->db->update('users');
		}

		public function enable_user($emp_id)
		{
			$this->db->set('status', 'active');
			$this->db->where('emp_id', $emp_id);
			$this->db->update('users');
		}

		/**
		*	Updates the password of a given user
		*
		*	@param Employee ID
		*	@param New Password
		*
		*	@return -1 - Update failed
		*	@return 1  - Successs
		**/
		public function change_password($emp_id, $password)
		{
			$this->db->set('password', $password);
			$this->db->where('emp_id', $emp_id);
			!$this->db->update('users');

			// get the password from the DB
			$result = $this->db->get_where('users', array('emp_id' => $emp_id));

			// check the retrieved password against the old one to if it's really changed
			foreach ($result->result() as $user) {
				if ($user->password !== $password) {
					return -1; // nope
				} else {
					return 1; // changed
				}
			}


		}
	}

?>
