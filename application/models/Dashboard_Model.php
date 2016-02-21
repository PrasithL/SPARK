<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_active_room_count()
    {
        $query = "SELECT count(id) as count FROM room_details WHERE status='active'";
        $result = $this->db->query($query);
        $result = $result->result();
        return $result[0]->count;
    }

    public function get_active_computer_count()
    {
        $query = "SELECT count(id) as count FROM computer_details WHERE status != 'Out of service'";
        $result = $this->db->query($query);
        $result = $result->result();
        return $result[0]->count;
    }

    public function get_open_issue_count()
    {
        $query = "SELECT count(id) as count FROM issues WHERE status='open'";
        $result = $this->db->query($query);
        $result = $result->result();
        return $result[0]->count;
    }

    public function get_inventory_item_count()
    {
        $query = "SELECT SUM(available) as count FROM inventory_details";
        $result = $this->db->query($query);
        $result = $result->result();
        return $result[0]->count;
    }

    public function get_recent_issues()
    {
        $this->db->where('status', 'open');
        $result = $this->db->get('issues', 5, 0);
        return $result->result();
    }

}
