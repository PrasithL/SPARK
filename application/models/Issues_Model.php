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
        $actions_taken = "";
        $result = $this->db->get_where('issues', array('id' => $input['issue_id']));
        foreach ($result->result() as $record) {
            $actions_taken = $record->actions_taken;
        }

        $actions_taken = $actions_taken.$input['actions_taken']." <br/> ";

        $this->db->set('status', "resolved");
        $this->db->set('actions_taken', $actions_taken);
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
        $this->db->order_by('closed_date', 'DESC');
        $result = $this->db->get_where('issues', array('status' => $status));
        return $result->result();
    }

    /**
     * Retrives open issues count of the given computer_id
     *
     * @param Computer Code
     **/
    public function get_open_issues_count($computer_id)
    {
        $result0 = $this->db->get_where('issue_history', array('computer_code' => $computer_id, 'status' => 'open'));
        return $result0->num_rows();
    }

    /**
     * Retrives all issues matching the passed computer_id
     *
     * @param Computer Code
     **/
    public function get_issues_of($computer_id)
    {
        $issues = null;
        $i = 1;

        $this->db->order_by('status', 'ASC'); // first sort by status. 'open' ones first
        //$this->db->order_by('closed_date', 'DESC'); // then sort by closed_date. recent ones first
        //$this->db->order_by('closed_time', 'DESC'); // for ones with the same date, sort by closed_time. recent ones first
        $this->db->order_by('id', 'DESC'); // BUT, there are no closed dates, times for 'open' issues, so they are just sorted by ID. recent ones first
        $result = $this->db->get_where('issue_history', array('computer_code' => $computer_id));
        foreach ($result->result() as $record) {
            $result2 = $this->db->get_where('issues', array('id' => $record->issue_id));
            $array = $result2->result();
            $issues[$i] = $array[0];
            $i = $i+1;
        }

        return $issues;
    }

    public function update_actions_taken($inputs)
    {
        $note = "";
        $result = $this->db->get_where('issues', array('id' => $inputs['issue_id']));
        foreach ($result->result() as $record) {
            $note = $record->actions_taken;
        }

        $note = $note.$inputs['actions_taken']." <br/> ";

        $this->db->set('actions_taken', $note);
        $this->db->where(array('id' => $inputs['issue_id']));
        $this->db->update('issues');
    }

    public function check_with_issues_history_table($issue_id)
    {
        $result = $this->db->get_where('issue_history', array('issue_id' => $issue_id, 'status' => 'open' ));
        if ($result->num_rows() == 0) {
            $this->db->set('status', "resolved");
            $this->db->set('closed_date', date("Y-m-d"));
            $this->db->set('closed_time', date("H:i:s a"));
            $this->db->set('closed_by', $this->session->userdata('username'));
            $this->db->where('id', $issue_id);
            $this->db->update('issues');
        }
    }

}
