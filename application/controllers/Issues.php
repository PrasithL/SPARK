<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issues extends CI_Controller{

    public function __construct()
    {
    parent::__construct();
        $this->check_login();
    }

    function index()
    {
        $this->load->model("Computer_Details_Model");

        $data['computers'] = $this->Computer_Details_Model->get_all_computers("computer_id");
        if (null !== $this->session->flashdata('result')) {
            $data['result'] = $this->session->flashdata('result');
        }
		// loading the page
		$this->load->view("header");
		$this->load->view('issues_view', $data);
		$this->load->view("footer");
    }

    public function add_issue()
    {
        $data = $this->input->post(); // $data stores the associative array of inputs

        $this->load->model("Issues_Model");
        $result = $this->Issues_Model->add_issue($data);

        $this->session->set_flashdata('result', $result);
        redirect('index.php/Issues');
    }

    /**
    * An AJAX call comes here and this will return the list of
    * the issues and other related data
    *
    */
    public function get_issues()
    {
        $this->load->model("Issues_Model");
        $this->load->model("Issue_History_Model");

        $data['issues'] = $this->Issues_Model->get_issues('open');
        $data['issue_history_records'] = $this->Issue_History_Model->get_all();

        $this->load->view('issues_list', $data);
    }

    /**
    * An AJAX call comes here and this will return the list of
    * the issues and other related data
    *
    */
    public function get_closed_issues()
    {
        $this->load->model("Issues_Model");
        $this->load->model("Issue_History_Model");

        $data['issues'] = $this->Issues_Model->get_issues('resolved');
        $data['issue_history_records'] = $this->Issue_History_Model->get_all('resolved');
        $data['view'] = "resolved"; // to let the view know what data we are viewing

        $this->load->view('issues_list', $data);
    }

    /**
    * An AJAX call comes here and this will mark the passed
    * issue history record of the passed computer as resolved
    *
    */
    public function close_issue_for_computer()
    {
        $inputs = $this->input->post(); // issue_id & computer_code & actions_taken

        $this->load->model("Issues_Model");
        $this->load->model("Issue_History_Model");

        $this->Issue_History_Model->close_issue_for_computer($inputs);
        $this->Issues_Model->update_actions_taken($inputs);

        echo "done";
    }

    /**
    * An AJAX call comes here and after retirving the posted issue_id
    * will mark that issue as closed and return a string value to be set as label values
    *
    */
    public function close_issue()
    {
        $input = $this->input->post();

        $this->load->model("Issues_Model");
        $this->load->model("Issue_History_Model");

        $this->Issues_Model->close_issue($input);
        $this->Issue_History_Model->close_issues($input);

        echo "resolved";
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
