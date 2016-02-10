<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Used_Inventory_Items_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * Create a new record
     *
     * @param data associative array with column names as keys with values
     **/
    public function add_record($data)
    {
        $data['created_date'] = date("Y-m-d");
        $data['created_time'] = date("H:i:s");
        $data['created_by'] = $this->session->userdata('username');

        $this->db->insert('used_inventory_items', $data);
    }

    /**
     * Retrive all records matching the given computer ID
     *
     * @param computer_id ID of the computer
     **/
    public function get_added_parts_of($computer_id)
    {
        $sql = "SELECT inventory_details.id, item_name, type, used_inventory_items.created_date, used_inventory_items.created_time, used_inventory_items.created_by FROM `used_inventory_items` JOIN inventory_details ON item_id = inventory_details.id WHERE computer_code = '".$computer_id."'";
        $result = $this->db->query($sql);
        return $result->result();
    }
}
