<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * Retrive inventory item types from the DB table 'ininventory_item_types'
     *
     * @param void
     **/
    public function get_item_types()
    {
        $this->db->order_by('name', 'ASC');
        $result = $this->db->get('inventory_item_types');
        return $result->result();
    }

    /**
     *
     * Insert a new item record to DB
     *
     * @param associative array with column names as keys
     **/
    public function add_inventory_item($data)
    {
        $data["available"] = $data['quantity'];
        $data["created_date"] = date("Y-m-d");
        $data["created_time"] = date("H:i:s");
        $data["created_by"]   = $this->session->userdata('username');

        if( $this->db->insert('inventory_details', $data)) {
            return 1; // success
        }

        return -1;
    }

    /**
     * Retrive all inventory item records
     *
     * @param void
     **/
    public function get_all_items()
    {
        $result = $this->db->get('inventory_details');
        return $result->result();
    }

    /**
     * Retrive the details of a specific inventory item
     *
     * @param ID of the item
     **/
    public function get_details_of_item($id)
    {
        $result = $this->db->get_where('inventory_details', array('id' => $id));
        return $result->result();
    }

}
