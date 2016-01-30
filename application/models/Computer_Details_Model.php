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

            // enter record to location_history
            $this->add_location_history_record($data);
        }

        return 1; // success

    }

    /**
    *
    * update a computer's record in the DB
    *
    * @param Associative array with column names as keys and respective values
    *
    * @return on success return the record of the updated computer
    * @return on error returns an error msg
    **/
    public function update_computer($data)
    {
        $this->db->where('computer_id', $data['computer_id']);
        $result = $this->db->get('computer_details');
        $this->db->where('computer_id', $data['computer_id']);
        if ( $this->db->update('computer_details', $data)) {
            foreach ($result->result() as $row)
            {
                    if($row->location != $data['location']) {
                        // enter record to location_history
                        $this->add_location_history_record($data);
                    }
            }
            return "1";
        } else {
            return "An error occured! Unable to Update record"; // error
        }
    }

    public function add_location_history_record($data)
    {
        $location_data['computer_id']   = $data["computer_id"];
        $location_data['location']      = $data["location"];
        $location_data["created_by"]    = $this->session->userdata('username');
        $location_data['created_date']  = date("Y-m-d");

        $this->db->insert('location_history', $location_data);
    }

    public function get_all_computers()
    {
        $result = $this->db->get('computer_details');
        return $result->result();
    }

    public function get_all_active_rooms()
    {
        $result = $this->db->get_where("room_details", array('status' => 'active'));
        return $result->result();
    }

    public function get_details_of($computer_id)
    {
        $result = $this->db->get_where("computer_details", array('computer_id' => $computer_id));
        return $result->result();
    }

    public function get_location_history_of($computer_id)
    {
        $result = $this->db->get_where("location_history", array('computer_id' => $computer_id));
        return $result->result();
    }

}
