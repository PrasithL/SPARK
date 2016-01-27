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
        // $computer_id    = $this->input->post('computer_id');
        // $processor      = $this->input->post('processor');
        // $motherboard    = $this->input->post('motherboard');
        // $ram            = $this->input->post('ram');
        // $hdd            = $this->input->post('hdd');
        // $monitor        = $this->input->post('monitor');
        // $mouse          = $this->input->post('mouse');
        // $keyboard       = $this->input->post('keyboard');
        // $status         = $this->input->post('status');
        // $note           = $this->input->post('note');
        $data = $this->input->post(); // $data stores the associative array of inputs

        //echo $computer_id." ".$processor." ".$motherboard." ".$ram ." ".$hdd." ".$monitor." ".$mouse." ".$keyboard." ".$status." ".$note;
        $this->load->model("Computer_Details_Model");
        //$result = $this->Computer_Details_Model->add_computer($computer_id, $processor, $motherboard, $ram , $hdd, $monitor, $mouse, $keyboard, $status, $note);
        $result = $this->Computer_Details_Model->add_computer($data);

        $this->session->set_flashdata('result', $result);
        redirect('index.php/Computer_Details');
    }

    public function show_details_of_one_computer()
    {
        $computer_id = $this->input->post('computer_id');

        $this->load->model("Computer_Details_Model");
        $data['computer'] = $this->Computer_Details_Model->get_details_of($computer_id);
        $this->load->view('computer_details_form', $data);

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
