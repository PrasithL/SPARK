<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }

    function index()
    {
        $data = null;
        if (null !== $this->session->flashdata('result')) {
            $data['result'] = $this->session->flashdata('result');
        }

        $this->load->model('Inventory_Model');
        $data['item_types'] = $this->Inventory_Model->get_item_types();

        $this->load->view('header');
        $this->load->view('inventory_view', $data);
        $this->load->view('footer');
    }

    /**
     *
     * Adds an item record to the DB by calling the model.
     *
     * @param void
     **/
    public function add_inventory_item()
    {
        $data = $this->input->post();

        $this->load->model("Inventory_Model");
        $result = $this->Inventory_Model->add_inventory_item($data);

        $this->session->set_flashdata('result', $result);
        redirect('index.php/Inventory');
    }

    /**
     *
     * Retrive all inventory item details from the DB and pass it to the inventory_item_list.php
     * and load that page.
     * request is handled on the client side with AJAX
     *
     * @param void
     **/
    public function get_all_items()
    {
        $this->load->model(array('Inventory_Model', 'Computer_Details_Model'));
        $data['items'] = $this->Inventory_Model->get_all_items();
        $data['computers'] = $this->Computer_Details_Model->get_all_computers();

        $this->load->view('inventory_item_list', $data);
    }

    /**
     * load details of one item and return the page
     *
     * @param type var Description
     **/
    public function get_details_of_item($id = null, $result = null)
    {
        if ($id == null) {
            $id = $this->input->post('id');
        }

        $this->load->model("Inventory_Model");
        $data["item"] = $this->Inventory_Model->get_details_of_item($id);
        $data['item_types'] = $this->Inventory_Model->get_item_types();
        $data["flag"] = "view";
        if ($result != null) {
            $data['update_result'] = $result;
        }

        $this->load->view('inventory_form', $data);
    }

    /**
     * update an item record
     *
     * @param void
     **/
    public function update_item()
    {
        $data = $this->input->post();

        $this->load->model('Inventory_Model');
        $result = $this->Inventory_Model->update_item($data);

        $this->get_details_of_item($data['id'], $result);
    }

    /**
     * Adds a record to the DB to emulate the using of an item
     *
     * @param type var Description
     **/
    public function use_item()
    {
        $data = $this->input->post();
        $item_type = $data['item_type'];
        // removing this from the array because the table doesn't have a column for this.
        unset($data['item_type']);

        $this->load->model('Used_Inventory_Items_Model');
        $this->load->model('Inventory_Model');
        $this->load->model('Computer_Details_Model');

        $this->Used_Inventory_Items_Model->add_record($data);
        // decrement the count of the available items by 1
        $this->Inventory_Model->decrement_available_count($data['item_id']);

        // if the item is a processor, HDD, motherboard, RAM, mouse, keyboard or a monitor update the related record in
        // computer_details table

        // first we need the details of the item_id
        $result = $this->Inventory_Model->get_details_of_item($data['item_id']);
        switch ($item_type) {
            case 'CPU':
                $item = array('computer_id' => $data['computer_code'], 'processor' => $result[0]->details );
                $this->Computer_Details_Model->update_computer($item);
                break;

            case 'HDD':
                $item = array('computer_id' => $data['computer_code'], 'hdd' => $result[0]->details );
                $this->Computer_Details_Model->update_computer($item);
                break;

            case 'RAM':
                $item = array('computer_id' => $data['computer_code'], 'ram' => $result[0]->details );
                $this->Computer_Details_Model->update_computer($item);
                break;

            case 'Motherboard':
                $item = array('computer_id' => $data['computer_code'], 'motherboard' => $result[0]->details );
                $this->Computer_Details_Model->update_computer($item);
                break;

            case 'Keyboard':
                $item = array('computer_id' => $data['computer_code'], 'keyboard' => "1" );
                $this->Computer_Details_Model->update_computer($item);
                break;

            case 'Mouse':
                $item = array('computer_id' => $data['computer_code'], 'mouse' => "1" );
                $this->Computer_Details_Model->update_computer($item);
                break;

            case 'Monitor':
                $item = array('computer_id' => $data['computer_code'], 'monitor' => "1" );
                $this->Computer_Details_Model->update_computer($item);
                break;

            default:
                # code...
                break;
        }

        $this->get_all_items();
    }

    /**
    * Checks if user is logged in by looking at session data.
    * if user is not logged in, redirects to the login page.
    *
    * @return null
    */
    private function check_login()
    {
        if ( !$this->session->userdata('username')) {
            $this->session->set_flashdata('msg', 'You have to login first!');
            redirect('index.php/Login');
        }
    }

}
