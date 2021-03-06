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
        $data["created_time"] = date("H:i:s");
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
        if (!isset($data['monitor'])) {
            $data['monitor'] = "";
        }
        if (!isset($data['mouse'])) {
            $data['mouse'] = "";
        }
        if (!isset($data['keyboard'])) {
            $data['keyboard'] = "";
        }


        $this->db->where('computer_id', $data['computer_id']);
        // get the computer's details before the update
        $result = $this->db->get('computer_details');

        $this->db->where('computer_id', $data['computer_id']);

        if ( $this->db->update('computer_details', $data)) {
            // I don't think a foreach is needed here. but let's leave it alone for now.
            foreach ($result->result() as $row)
            {
                    if(isset($data['location']) && $row->location != $data['location']) {
                        // enter record to location_history
                        $this->add_location_history_record($data);
                    }
            }
            return "1";
        } else {
            return "An error occured! Unable to Update record"; // error
        }
    }

    public function delete_computer($computer_id)
    {
        $this->db->set('is_deleted', '1');
        $this->db->where('computer_id', $computer_id);
        $this->db->update('computer_details');
    }

    public function add_location_history_record($data)
    {
        $location_data['computer_id']   = $data["computer_id"];
        $location_data['location']      = $data["location"];
        $location_data["created_by"]    = $this->session->userdata('username');
        $location_data['created_date']  = date("Y-m-d");

        $this->db->insert('location_history', $location_data);
    }

    /**
    *   Retrieves all records from the computer_details table
    *   if called with a parameter selects that columns and returns it
    *
    *   @param column names to select from the table. comma (,) sepereated list
    */
    public function get_all_computers($cols = null)
    {
        if ($cols != null) {
            $this->db->select($cols);
        }
        $this->db->where('is_deleted', '0');
        $result = $this->db->get('computer_details');
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

    public function computer_count_by_room()
    {
        $sql = "SELECT location, COUNT(computer_id) AS count FROM `computer_details` where is_deleted = '0' GROUP BY location ORDER BY location ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function computers_count_with_issues()
    {
        $sql = "SELECT location, SUM(CASE WHEN status = 'Requires Repairs' THEN 1 ELSE 0 END) AS repair_count FROM `computer_details` where is_deleted = '0' GROUP BY location ORDER BY location ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_computers_in($room_code)
    {
        $this->db->where('is_deleted', '0');
        $result = $this->db->get_where('computer_details', array('location' => $room_code ));
        return $result->result();
    }

}
