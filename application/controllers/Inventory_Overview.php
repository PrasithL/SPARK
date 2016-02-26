<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inventory_Overview extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }

    function index()
    {
        $this->load->model("Inventory_Model");

        $data['item_types'] = $this->Inventory_Model->get_all_item_types();
        $data['items'] = $this->Inventory_Model->get_details_for_report();

        $this->load->view('header');
        $this->load->view('inventory_overview_report_view', $data);
        $this->load->view('footer');
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
