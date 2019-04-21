<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin');
	}

	public function dashboard() {
		$username = $this->session->userdata('driver');

		$data['current_jobs'] = $this->admin->readData('drivers_job', array('assigned_driver' => $username['uname'], 'warehouse_status' => 0));

		$data['passed'] = $this->admin->readData('drivers_job', array('assigned_driver' => $username['uname'], 'status' => 1, 'warehouse_status' => 1));

		$this->load->view('drivers/dashboard', $data);
	}

	public function cargoRecieved($id) {
		$this->form_validation->set_rules('id', 'ID', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $error));
		} else {
			$this->admin->updateItem('delivery', array('confirm_driver_receive' => 1), array('id' => $id));
			$this->admin->updateItem('drivers_job', array('status' => 1), array('tb_cargo_id' => $id));
			echo json_encode(array('success' => 'Form submitted successfully.'));
		}

	}

	public function cancelCargoRecieved($id) {
		$this->form_validation->set_rules('id', 'ID', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $error));
		} else {
			$this->admin->updateItem('delivery', array('confirm_driver_receive' => 0), array('id' => $id));
			$this->admin->updateItem('drivers_job', array('status' => 0), array('tb_cargo_id' => $id));
			echo json_encode(array('success' => 'Form submitted successfully.'));
		}

	}

	public function deliverySent($id) {
		$this->form_validation->set_rules('id', 'ID', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $error));
		} else {
			$this->admin->updateItem('delivery', array('confirm_driver_deliver' => 1), array('id' => $id));
			echo json_encode(array('success' => 'Form submitted successfully.'));
		}
	}

}

/* End of file drivers.php */
/* Location: ./application/controllers/drivers.php */