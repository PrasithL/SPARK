<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computer_Details extends CI_Controller{

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

        $this->load->model("Computer_Details_Model");
        $this->load->model("Room_Details_Model");
        $data['computers'] = $this->Computer_Details_Model->get_all_computers();
        $data['rooms'] = $this->Room_Details_Model->get_all_active_rooms();

        $this->load->view('header');
        $this->load->view('computer_details_view', $data);
        $this->load->view('footer');
    }

    /**
     * Retrieve input data from the form and pass it to Computer_Details_Model to
     * create a new record.
     *
     * @param none
     **/
    public function add_computer()
    {
        $data = $this->input->post(); // $data stores the associative array of inputs

        $this->load->model("Computer_Details_Model");
        $result = $this->Computer_Details_Model->add_computer($data);

        $this->session->set_flashdata('result', $result);
        redirect('index.php/Computer_Details');
    }

    /**
    * An AJAX call comes here and this will return the details of
    * the computer with the posted id.
    *
    */
    public function show_details_of_one_computer($computer_id = null)
    {
        if ($computer_id == null) {
            $computer_id = $this->input->post('computer_id');
        }

        $this->load->model("Computer_Details_Model");
        $this->load->model("Room_Details_Model");
        $this->load->model("Issues_Model");
        $this->load->model("Used_Inventory_Items_Model");
        $this->load->model("Computer_Maintenance_Model");

        $data['computer'] = $this->Computer_Details_Model->get_details_of($computer_id);
        $data['history'] = $this->Computer_Details_Model->get_location_history_of($computer_id);
        $data['rooms'] = $this->Room_Details_Model->get_all_active_rooms();
        $data['open_issue_count'] = $this->Issues_Model->get_open_issues_count($computer_id);
        $data['added_parts'] = $this->Used_Inventory_Items_Model->get_added_parts_of($computer_id);
        $data['maintenance'] = $this->Computer_Maintenance_Model->get_record($computer_id);

        $this->load->view('computer_details_form', $data);

    }

    /**
    * An AJAX call comes here and this will return the details of
    * the issues of the computer with the posted ID
    *
    */
    public function show_issue_history_of()
    {
        if (null !== $this->session->flashdata('computer_id')) {
            $computer_id = $this->session->flashdata('computer_id');
        } else {
            $computer_id = $this->input->post('computer_id');
        }


        $this->load->model("Issues_Model");
        $this->load->model("Issue_History_Model");

        $data['issues'] = $this->Issues_Model->get_issues_of($computer_id);
        $data['issue_history_records'] = $this->Issue_History_Model->get_all();
        $data['computer_id'] = $computer_id;

        $this->load->view('computer_details_issues_list', $data);

    }

    /**
    * An AJAX call comes here and this will return the details of
    * the computer with the posted id.
    *
    */
    public function update_computer()
    {
        $data = $this->input->post(); // $data stores the associative array of inputs

        $this->load->model("Computer_Details_Model");
        $this->Computer_Details_Model->update_computer($data);

        $this->show_details_of_one_computer($data['computer_id']); // reload the view
    }

    /**
    * A delete request comes here, with the id of the computer to be deleted.
    *
    */
    public function delete_computer()
    {
        $id = $this->input->post('id'); // $data stores the associative array of inputs

        $this->load->model("Computer_Details_Model");
        $this->Computer_Details_Model->delete_computer($id);

        redirect('Computer_Details','refresh');
    }

    /**
    * An AJAX call comes here and this will return the details of
    * the computer with the posted id.
    *
    */
    public function get_boxes()
    {
        $this->load->model("Computer_Details_Model");
        $data['computers'] = $this->Computer_Details_Model->get_all_computers();
        $this->load->view('computer_detail_boxes', $data);
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
