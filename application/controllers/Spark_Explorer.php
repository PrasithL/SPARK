<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spark_Explorer extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }

    function index()
    {
        $this->load->view('header');
        $this->load->view('spark_explorer_view');
        $this->load->view('footer');
    }

    public function get_room_boxes()
    {
        $this->load->model('Room_Details_Model');
        $this->load->model('Computer_Details_Model');

        $data['rooms'] = $this->Room_Details_Model->get_all_active_rooms();
        $data['computer_count'] = $this->Computer_Details_Model->computer_count_by_room();
        $data['computer_count_with_issues'] = $this->Computer_Details_Model->computers_count_with_issues();

        $this->load->view('spark_explorer_room_boxes', $data);
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

    public function get_computer_in_room()
    {
        $room_code = $this->input->post('room_code');

        $this->load->model("Computer_Details_Model");
        $data['computers'] = $this->Computer_Details_Model->get_computers_in($room_code);
        $this->load->view('computer_detail_boxes', $data);

    }
}
