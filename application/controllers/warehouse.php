<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {
	private $username;

	public function __construct() {
		parent::__construct();
		$this->load->model('admin');
		$this->username = $this->session->userdata('warehouse');
	}

	public function dashboard() {

		$data['rooms'] = $this->admin->readData('warehouses', array('username' => $this->username['uname']));
		$this->load->view('warehouse/dashboard', $data);
	}

	public function delivery() {
		$data['rooms'] = $this->admin->readData('warehouses', array('username' => $this->username['uname']));

		$data['deliveries'] = $this->admin->readData('delivery', array('deliver_warehouse_id' => $this->username['uname'], 'confirm_warehouse_receive' => 0));

		$data['completeDeliveries'] = $this->admin->readData('delivery', array('deliver_warehouse_id' => $this->username['uname'], 'confirm_warehouse_deliver' => 1, 'confirm_warehouse_receive' => 1));

		$this->load->view('warehouse/delivery', $data);
	}

	public function createRoom() {
		$this->form_validation->set_rules('nameOfStorage', 'name of storage', 'trim|required|is_unique[warehouses.room]');
		$this->form_validation->set_rules('typeOfStorage', 'type of storage', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			$roomData = array(
				'room' => $this->input->post('nameOfStorage'),
				'type' => $this->input->post('typeOfStorage'),
				'username' => $this->username['uname']);

			if ($this->admin->insertItem('warehouses', $roomData)) {
				echo json_encode(array('success' => 'Form submitted successfully.'));
			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}

		}
	}

	public function deleteRoom($id) {
		if ($this->admin->deleteItem('warehouses', array('id' => $id))) {
			echo json_encode(array('success' => 'Warehouse Deleted.'));
		}
	}

	public function editRoom($id) {
		if ($id === NULL) {
			show_404();
		} else {
			if (empty($this->admin->readData('warehouses', array('id' => $id)))) {
				show_404();
			} else {
				echo json_encode($this->admin->readData('warehouses', array('id' => $id)));
			}
		}
	}
	public function editRoomData($id) {
		$this->form_validation->set_rules('room', 'name of storage', 'trim|required');
		$this->form_validation->set_rules('type', 'type of storage', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			$roomEditData = array(
				'room' => $this->input->post('room'),
				'type' => $this->input->post('type'),
				'username' => $this->username['uname'],
			);
			if ($this->admin->updateItem('warehouses', $roomEditData, array('id' => $id))) {
				echo json_encode(array('success' => 'Form submitted successfully.'));
			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}

		}
	}

	public function seeMoreDetails($id) {
		if ($id == NULL) {
			show404('page not found');
		} else {
			$data = $this->admin->readData('delivery', array('id' => $this->input->post('id')));
			$data1 = $this->admin->readData('cargo', array('unique_name' => $data[0]->cargo_data_id));
			if (!empty($data)) {

				$data_merge = array_merge($data, $data1);
				echo json_encode($data_merge);
			} else {
				echo json_encode(array('error' => 'Results Not Found'));
			}
		}
	}
	public function approveDelivery($id) {

		$this->form_validation->set_rules('warehouseRoom', 'Warehouse Room', 'trim|required');
		$this->form_validation->set_rules('trackingId', 'tracking Id', 'trim|required|is_unique[drivers_job.tracking_id]');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {
			$data =
			array(
				"tb_cargo_id" => $this->input->post('id'),
				"tracking_id" => $this->input->post('trackingId'),
				"delivery_warehouse" => $this->input->post('deliveryWarehouse'),
				"arrival_delivery" => $this->input->post('arrivalDelivery'),
				"cargo_type" => $this->input->post('cargoType'),
				"quantity" => $this->input->post('quantity'),
				"weight" => $this->input->post('weight'),
				"warehouse_room " => $this->input->post('warehouseRoom'),
				"cargo_unique_name " => $this->input->post('uniqueCargoName'),
				"warehouse_address" => $this->username['address'],
				"status" => 0,
				"warehouse_status" => 0,
				"assigned_driver " => $this->input->post('assignedDriver'));

			if ($this->admin->insertItem('drivers_job', $data)) {
				$this->admin->updateItem('delivery', array('confirm_warehouse_deliver' => 1), array('cargo_data_id' => $this->input->post('uniqueCargoName')));
				$data['driverEmail'] = $this->admin->readData('users', array('username' => $this->input->post('assignedDriver')));

				echo json_encode(array('success' => 'Form submitted successfully.'));
			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}
		}
	}

	public function disapprove($id) {
		if ($id === NULL) {
			show404();
		} else {
			if ($this->admin->deleteItem('drivers_job', array('tb_cargo_id' => $id))) {
				if ($this->admin->updateItem('delivery', array('confirm_warehouse_deliver' => 0), array('id' => $id))) {
					$sess_data = array('type' => 'success', 'msg' => 'Stock Disapproved');
					$this->session->set_flashdata('toastr', $sess_data);
				}
			}

			redirect('warehouse/delivery');
		}
	}

	public function received($id) {
		if ($id === NULL) {
			show404();
		} else {
			$this->admin->updateItem('delivery', array('confirm_warehouse_receive' => 1), array('id' => $id));
			$this->admin->updateItem('drivers_job', array('warehouse_status' => 1), array('tb_cargo_id' => $id));
			$this->admin->updateItem('delivery', array('status' => 1), array('id' => $id));
			$sess_data = array('type' => 'success', 'msg' => 'Stock Recieved');
			$this->session->set_flashdata('toastr', $sess_data);

			redirect('warehouse/delivery');
		}
	}
}

/* End of file warehouse.php */
/* Location: ./application/controllers/warehouse.php */