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
        $data['computers'] = $this->Computer_Details_Model->get_all_computers();

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
    public function show_details_of_one_computer()
    {
        $computer_id = $this->input->post('computer_id');

        $this->load->model("Computer_Details_Model");
        $data['computer'] = $this->Computer_Details_Model->get_details_of($computer_id);
        $this->load->view('computer_details_form', $data);

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
        $data['computer'] = $this->Computer_Details_Model->get_details_of($data['computer_id']);

        $this->load->view('computer_details_form', $data);
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
