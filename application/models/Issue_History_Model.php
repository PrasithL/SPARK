<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_History_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
    *
    * Retrieve all records matching the status
    * or all records if no arhuments are passed
    *
    * @param null
    **/
    public function get_all($status = null)
    {
        if ($status == null ) {
            $result = $this->db->get('issue_history');
        } else {
            $result = $this->db->get_where('issue_history', array('status' => $status));
        }

        return $result->result();
    }

    /**
     *
     * Closes issues records by marking them as resolved
     * and also updates computer_details table to reflect the computers status
     *
     * @param type var Description
     **/
    public function close_issues($input)
    {
        $this->db->set('status', "resolved");
        $this->db->set('closed_date', date("Y-m-d"));
        $this->db->set('closed_time', date("H:i:s a"));
        $this->db->set('closed_by', $this->session->userdata('username'));
        $this->db->where('issue_id', $input['issue_id']);
        $this->db->update('issue_history');

        $result = $this->db->get_where("issue_history", array('issue_id' => $input['issue_id']));
        foreach ($result->result() as $record) {
            $result2 = $this->db->get_where("issue_history", array('computer_code' => $record->computer_code, 'status' => 'open'));
            if ($result2->num_rows() == 0) {
                $this->db->set('status', "Functional");
                $this->db->where('computer_id', $record->computer_code);
                $this->db->update('computer_details');
            }
        }
    }

    public function close_issue_for_computer($inputs)
    {
        $this->db->set('status', "resolved");
        $this->db->set('closed_date', date("Y-m-d"));
        $this->db->set('closed_time', date("H:i:s a"));
        $this->db->set('closed_by', $this->session->userdata('username'));
        $this->db->where(array('issue_id' => $inputs['issue_id'], 'computer_code' => $inputs['computer_code'] ));
        $this->db->update('issue_history');

        $result = $this->db->get_where("issue_history", array('issue_id' => $inputs['issue_id']));
        foreach ($result->result() as $record) {
            $result2 = $this->db->get_where("issue_history", array('computer_code' =>  $inputs['computer_code'], 'status' => 'open'));
            if ($result2->num_rows() == 0) {
                $this->db->set('status', "Functional");
                $this->db->where('computer_id', $inputs['computer_code']);
                $this->db->update('computer_details');
            }
        }

        $this->load->model("Issues_Model");
        $this->Issues_Model->check_with_issues_history_table($inputs['issue_id']);
    }

}
