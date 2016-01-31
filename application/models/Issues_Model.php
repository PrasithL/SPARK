<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issues_Model extends CI_Model{

    public function __construct()
    {
    parent::__construct();
    }

    /**
    *
    * Add a new issue record to the DB
    *
    * @param Associative array with column names as keys and respective values
    *
    * @return 1 - success
    * @return 0 - Record already EXISTS
    * @return -1 - Error
    **/
    public function add_issue($data)
    {
        $issue["issue"]       = $data["issue"];
        $issue["description"] = $data["description"];
        $issue["severity"]    = $data["severity"];
        $issue["status"]      = "open";
        $issue["opened_date"] = date("Y-m-d");
        $issue["opened_time"] = date("H:i:s a");
        $issue["opened_by"]   = $this->session->userdata('username');

        // inserting to issues table
        if( !$this->db->insert('issues', $issue)) {
          return -1; // error
        }

        // get the id of the created issue
        $this->db->select_max('id');
        $result = $this->db->get('issues');
        $issue_id = $result->result_array();
        print_r($issue_id);
        $issue_history["issue_id"] = $issue_id[0]['id'];

        // enter record to issue_history
        foreach ($data["computers"] as $computer) {
            $issue_history["computer_code"] = $computer;
            $issue_history["status"] = "open";
            $this->db->insert('issue_history', $issue_history);

            // update computer_details table to reflect the computers current status
            $this->db->set('status', "Requires Repairs");
            $this->db->where('computer_id', $computer);
            $this->db->update('computer_details');
        }


        return 1; // success

    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function close_issue($input)
    {
        $this->db->set('status', "resolved");
        $this->db->set('actions_taken', $input['actions_taken']);
        $this->db->set('closed_date', date("Y-m-d"));
        $this->db->set('closed_time', date("H:i:s a"));
        $this->db->set('closed_by', $this->session->userdata('username'));
        $this->db->where('id', $input['issue_id']);
        $this->db->update('issues');
    }

    /**
     * Retrives all issues marked as open from thr issues table
     *
     * @param null
     **/
    public function get_issues($status)
    {
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get_where('issues', array('status' => $status));
        return $result->result();
    }

}
