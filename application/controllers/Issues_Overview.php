<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issues_Overview extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }

    function index()
    {
        $this->load->model("Issues_Model");

        $data['total_open'] = $this->Issues_Model->get_open_issue_count();
        $data['total_closed'] = $this->Issues_Model->get_closed_issue_count();

        $data['week_open_count'] = $this->Issues_Model->issues_opened_in_this('WEEK');
        $data['month_open_count'] = $this->Issues_Model->issues_opened_in_this('MONTH');
        $data['year_open_count'] = $this->Issues_Model->issues_opened_in_this('YEAR');

        $data['week_closed_count'] = $this->Issues_Model->issues_closed_in_this('WEEK');
        $data['month_closed_count'] = $this->Issues_Model->issues_closed_in_this('MONTH');
        $data['year_closed_count'] = $this->Issues_Model->issues_closed_in_this('YEAR');

        $data['open_count_room'] = $this->Issues_Model->get_open_issue_count_by_room();
        $data['closed_count_room'] = $this->Issues_Model->get_closed_issue_count_by_room();

        $data['open_issues_per_computer'] = $this->Issues_Model->get_open_issue_count_per_computer();

        $data['most_opened_by'] = $this->Issues_Model->most_opened_by();
        $data['most_closed_by'] = $this->Issues_Model->most_closed_by();


        $this->load->view('header');
        $this->load->view('issues_overview_report_view', $data);
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
