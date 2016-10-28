<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class software_list_Model extends CI_model
	{

		function __construct()
		{
			parent::__construct();
		}

		public function get_all_softwares()
		{
            $this->db->order_by('id', 'DESC');
			$result = $this->db->get('software_list');
			return $result->result();
		}

		public function add_softwares($data)
		{
			$result = $this->db->get_where("room_details");
			
						
			$this->db->insert('software_list', $data);

		}

		public function edit_software($data)
		{
			$this->db->set($data);
			$this->db->where('id', $data['id']);

			if (!$this->db->update('software_list')) {
				return -1;
			}
			return 1;
        }

      	public function delete_software($id)
      	{
      		$this->db->delete('software_list', array('id' => $id));

      	}
		
	}
	
?>
