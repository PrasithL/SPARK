<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Computer_Maintenance_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_record($computer_id)
	{
		$result = $this->db->get_where("computer_maintenance_details", array('computer_id' => $computer_id));
        return $result->result();
	}

	public function add_record($data)
	{
		$to_insert = $data;
		// remove the list of computers from the array.
		unset($to_insert['computers']);
		$to_insert["record_date"] = date("Y-m-d G:i:s");
        $to_insert["added_by"]   = $this->session->userdata('username');


		// enter record to issue_history
        foreach ($data["computers"] as $computer) {
            $to_insert["computer_id"] = $computer;

            $this->db->where('computer_id',$computer);
			$q = $this->db->get('computer_maintenance_details');

			// if record already exists, update it. else create a new record.
			if ( $q->num_rows() > 0 ) 
			{
			  $this->db->where('computer_id',$computer);
			  $this->db->update('computer_maintenance_details',$to_insert);
			} else {
			  $this->db->insert('computer_maintenance_details', $to_insert);
			}
        }


        return 1; // success
	}

}

/* End of file Computer_Maintenance_Model.php */
/* Location: ./application/models/Computer_Maintenance_Model.php */