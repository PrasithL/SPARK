<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Computer_Maintenance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model("Computer_Details_Model");

        $data['computers'] = $this->Computer_Details_Model->get_all_computers("computer_id");
        if (null !== $this->session->flashdata('result')) {
            $data['result'] = $this->session->flashdata('result');
        }
		// loading the page
		$this->load->view("header");
		$this->load->view('maintenance_record_form_view', $data);
		$this->load->view("footer");
	}

	public function add_record()
	{
		$data = $this->input->post(); // $data stores the associative array of inputs

        $this->load->model("Computer_Maintenance_Model");
        $result = $this->Computer_Maintenance_Model->add_record($data);

        $this->session->set_flashdata('result', $result);
        redirect('Computer_Maintenance');
	}

}

/* End of file Computer_Maintenance.php */
/* Location: ./application/controllers/Computer_Maintenance.php */