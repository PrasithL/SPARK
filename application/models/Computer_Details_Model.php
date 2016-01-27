<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computer_Details_Model extends CI_Model{

    public function __construct()
    {
    parent::__construct();
    }

    /**
    *
    * Add a new computer record to the DB
    *
    * @param Associative array with column names as keys and respective values
    *
    * @return 1 - success
    * @return 0 - Record already EXISTS
    * @return -1 - Error
    **/
    public function add_computer($data)
    {
        $data["created_date"] = date("Y-m-d");
        $data["created_time"] = date("h:i:s a");
        $data["created_by"]   = $this->session->userdata('username');

        $result = $this->db->get_where("computer_details", array('computer_id' => $data["computer_id"]));

        if ($result->num_rows() != 0) {
            return 0; // record already exists
        } else {
            if( !$this->db->insert('computer_details', $data)) {
                return -1; // error
            }
        }

        return 1; // success

    }

    public function get_all_computers()
    {
        $result = $this->db->get('computer_details');
        return $result->result();
    }

    public function get_details_of($computer_id)
    {
        $result = $this->db->get_where("computer_details", array('computer_id' => $computer_id));
        return $result->result();
    }

}
