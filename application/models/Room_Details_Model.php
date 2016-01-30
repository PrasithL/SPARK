<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* @author: Prasith Lakshan
	*
	* This model handles CRUD operations of the 'users' table in the DB
	*/
	class Room_Details_Model extends CI_model
	{

		function __construct()
		{
			parent::__construct();
		}

		/**
		 * @return Associative array of all rooms
		 */
		public function get_all_rooms()
		{
            $this->db->order_by('id', 'DESC');
			$result = $this->db->get("room_details");
			return $result->result();
		}

        public function get_all_active_rooms()
        {
            $result = $this->db->get_where("room_details", array('status' => 'active'));
            return $result->result();
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
		public function add_room($data)
		{
			$result = $this->db->get_where("room_details", array('room_code' => $data['room_code']));
			if ($result->num_rows() != 0) {
				return 0; // record already exists
			} else {
                $data["status"] = "active";
                $data["created_date"] = date("Y-m-d");
                $data["created_by"]   = $this->session->userdata('username');

				if( !$this->db->insert('room_details', $data)) {
					return -1; // error
				}

				return 1; // success
			}
		}

		public function disable_room($room_code)
		{
			$this->db->set('status', 'disabled');
			$this->db->where('room_code', $room_code);
			$this->db->update('room_details');
		}

		public function enable_room($room_code)
		{
			$this->db->set('status', 'active');
			$this->db->where('room_code', $room_code);
			$this->db->update('room_details');
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
			$this->db->update('users');

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
