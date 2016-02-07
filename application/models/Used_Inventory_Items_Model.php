<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Used_Inventory_Items_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function add_record($data)
    {
        $data['created_date'] = date("Y-m-d");
        $data['created_time'] = date("H:i:s");
        $data['created_by'] = $this->session->userdata('username');

        $this->db->insert('used_inventory_items', $data);
    }
}
