<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_History_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
    *
    * Retrieve all records
    *
    * @param null
    **/
    public function get_all($status)
    {
        $result = $this->db->get_where('issue_history', array('status' => $status));
        return $result->result();
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function close_issues($input)
    {
        $this->db->set('status', "resolved");
        $this->db->set('closed_date', date("Y-m-d"));
        $this->db->set('closed_by', $this->session->userdata('username'));
        $this->db->where('issue_id', $input['issue_id']);
        $this->db->update('issue_history');
    }

}
