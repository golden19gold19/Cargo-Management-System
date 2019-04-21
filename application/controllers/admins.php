<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of admins
 *
 * @author User
 */
class admins extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
		$this->load->model('admin');
	}

	public function dashboard() {
		$data['users'] = $this->admin->readData('users', array('id !=' => 0));
		$this->load->view('admin/dashboard', $data);

	}

	public function createUsers() {
		//form validation
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('contact', 'contact', 'trim|required|numeric|min_length[10]|max_length[12]|is_unique[users.contact]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[2]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			if ($this->input->post('role') == 'Cargo Company') {
				$access_level = 900;
			} else {
				if ($this->input->post('role') == 'Warehouse') {
					$access_level = 500;
				} else {
					if ($this->input->post('role') == 'Driver') {
						$access_level = 100;
					}
				}
			}

			$user_credentials = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'access_level' => $access_level,
				'role' => $this->input->post('role'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'));
			if ($this->user->insertUser('users', $user_credentials)) {
				echo json_encode(array('success' => 'Form submitted successfully.', 'fir' => 'filleee'));

			} else {
				echo json_encode(array('error' => 'Form Not Submitted.'));
			}

		}
	}

	public function editUsers($id) {

		if ($id === NULL) {
			show_404();
		} else {
			if (empty($this->admin->readData('users', array('id' => $id)))) {
				show_404();
			} else {
				echo json_encode($this->admin->readData('users', array('id' => $id)));
			}
		}

	}

	public function editUserData($id) {
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('contact', 'contact', 'trim|required|numeric|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			if ($this->input->post('role') == 'Cargo Company') {
				$access_level = 900;
			} else {
				if ($this->input->post('role') == 'Warehouse') {
					$access_level = 500;
				} else {
					if ($this->input->post('role') == 'Driver') {
						$access_level = 100;
					}
				}
			}
			$update_data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'role' => $this->input->post('role'),
				'access_level' => $access_level,
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'));
			if ($this->admin->updateUser('users', $update_data, array('id' => $id))) {
				//also update deliveries table if username is changed
				echo json_encode(array('success' => 'Form submitted successfully.'));

			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}

		}
	}

	public function deleteUser($id) {
		if ($this->admin->deleteUser('users', array('id' => $id))) {
			echo json_encode(array('success' => 'User Deleted.'));
		}
	}

	public function cargo() {
		$data['cargos'] = $this->admin->readData('cargo', array('status' => 0));

		$this->load->view('admin/cargo', $data);
	}

	public function createCargo() {

		$this->form_validation->set_rules('quantity', 'quantity', 'trim|required|numeric');
		$this->form_validation->set_rules('uniname', 'unique name', 'trim|required|is_unique[cargo.unique_name]');
		$this->form_validation->set_rules('cargo_type', 'cargo type', 'trim|required');
		$this->form_validation->set_rules('delivered_on', 'delivered on', 'trim|required');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|numeric');
		$this->form_validation->set_rules('quantity', 'quantity', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			$item_date = array(
				'unique_name' => $this->input->post('uniname'),
				'quantity' => $this->input->post('quantity'),
				'weight' => $this->input->post('weight'),
				'cargo_type' => $this->input->post('cargo_type'),
				'delivered_on' => $this->input->post('delivered_on'),
				'status' => 0);

			if ($this->admin->insertItem('cargo', $item_date)) {
				echo json_encode(array('success' => 'Form submitted successfully.'));
			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}

		}
	}

	public function editCargo($id) {
		if ($id == NULL) {
			show_404();
		} else {
			if (empty($this->admin->readData('cargo', array('id' => $id)))) {
				show_404();
			} else {
				echo json_encode($this->admin->readData('cargo', array('id' => $id)));
			}
		}
	}

	public function editCargoData($id) {
		$this->form_validation->set_rules('uniname', 'unique name', 'trim|required');
		$this->form_validation->set_rules('quantity', 'quantity', 'trim|required|numeric');
		$this->form_validation->set_rules('cargo_type', 'cargo type', 'trim|required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('delivered_on', 'delivered on', 'trim|required');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|numeric');
		$this->form_validation->set_rules('quantity', 'quantity', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			$item_data = array(
				'unique_name' => $this->input->post('uniname'),
				'quantity' => $this->input->post('quantity'),
				'weight' => $this->input->post('weight'),
				'cargo_type' => $this->input->post('cargo_type'),
				'delivered_on' => $this->input->post('delivered_on'));

			if ($this->admin->updateItem('cargo', $item_data, array('id' => $id))) {
				echo json_encode(array('success' => 'Form submitted successfully.'));
			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}

		}
	}

	public function deleteCargo($id) {
		if ($this->admin->deleteItem('cargo', array('id' => $id))) {
			echo json_encode(array('success' => 'Cargo Deleted.'));
		}
	}

	public function delivery() {
		//echo '<script src="https://smtpjs.com/v3/smtp.js"></script>';
		// $template = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="format-detection" content="date=no"> <meta name="format-detection" content="telephone=no"> <title>Cargo Management System</title> <style type="text/css">body{margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table{border-spacing: 0;}table td{border-collapse: collapse;}.ExternalClass{width: 100%;}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height: 100%;}.ReadMsgBody{width: 100%; background-color: #ebebeb;}table{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}img{-ms-interpolation-mode: bicubic;}.yshortcuts a{border-bottom: none !important;}@media screen and (max-width: 599px){.force-row, .container{width: 100% !important; max-width: 100% !important;}}@media screen and (max-width: 400px){.container-padding{padding-left: 12px !important; padding-right: 12px !important;}}.ios-footer a{color: #aaaaaa !important; text-decoration: underline;}a[href^="x-apple-data-detectors:"],a[x-apple-data-detectors]{color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}</style></head><body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0"> <tr> <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;"> <br><table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px"> <tr> <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px"> Cargo Management System </td></tr><tr> <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff"> <br><div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Stock Alert </div><br><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333"> Stock has been Issued to be delivered to this warehouse login to confirm it <br>Login Url <a href="http://localhost/cargo-management-system">Cargo Management System</a><br><p>Cargo Data</p><hr><br><p>With Tracking ID' . "'" . '+ tracking_id+' . "'" . '<p/></div></td></tr><tr> <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px"> <br><br>Cargo Management System: © 2019. <br><br></td></tr></table> </td></tr></table></body></html>';

// 		echo ' <script>
		// 		function sendMailStock(mailto,tracking_id){
		//             Email.send({
		//     secureToken : "6037c5fb-dd02-4b69-b1ff-a5398030f4dd",
		//     Host : "smtp25.elasticemail.com",
		//     Username : "0554apana@gmail.com",
		//     Password : "6037c5fb-dd02-4b69-b1ff-a5398030f4dd",
		//     To : mailto,
		//     From : "0554apana@gmail.com",
		//     Subject : "Program Analysis",
		//     Body : ' . "'" . $template . "'" . '
		// });
		//     } </script>';

		$data['warehouses'] = $this->admin->readData('users', array('role' => 'Warehouse'));
		$data['drivers'] = $this->admin->readData('users', array('role' => 'Driver'));
		$data['cargos'] = $this->admin->readData('cargo', array('status' => 0));
		$data['deliveries'] = $this->admin->readData('delivery', array('status' => 0));
		$data['complete_deliveries'] = $this->admin->readData('delivery', array('status' => 1, 'confirm_driver_receive' => 1, 'confirm_driver_deliver' => 1, 'confirm_warehouse_receive' => 1, 'confirm_warehouse_deliver' => 1));

		$this->form_validation->set_rules('warehouse', 'warehouse', 'trim|required');
		$this->form_validation->set_rules('cargo', 'cargo', 'trim|required');
		$this->form_validation->set_rules('driver', 'driver', 'trim|required');
		$this->form_validation->set_rules('from_date', 'from date', 'trim|required');
		$this->form_validation->set_rules('to_date', 'to date', 'trim|required');
		$this->form_validation->set_rules('tracking_id', 'tracking_id', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/delivery', $data);
		} else {
			$admin = $this->session->userdata('admin');
			$data =
			array(
				'tracking_id' => $this->input->post('tracking_id'),
				'driver_id' => $this->input->post('driver'),
				'deliver_warehouse_id' => $this->input->post('warehouse'),
				'start_time' => $this->input->post('from_date'),
				'end_time' => $this->input->post('to_date'),
				'confirm_driver_receive' => 0,
				'confirm_driver_deliver' => 0,
				'confirm_warehouse_receive ' => 0,
				'cargo_data_id' => $this->input->post('cargo'),
				'issued_by' => $admin['uname'],
				'status' => 0);

			if ($this->admin->insertItem('delivery', $data)) {

				$data['warehouseEmail'] = $this->admin->readData('users', array('username' => $this->input->post('warehouse')));

				echo "<script>sendMailStock('" . $data['warehouseEmail'][0]->email . "','" . $this->input->post('tracking_id') . "');</script>";

				$this->admin->updateItem('cargo', array('status' => 1), array('unique_name' => $this->input->post('cargo')));
				$sess_data = array('type' => 'success', 'msg' => 'Cargo Issued');
				$this->session->set_flashdata('toastr', $sess_data);
			}
			redirect('admins/delivery', 'refresh');

		}

	}

	public function editDelivery($id) {

		if ($id === NULL) {
			show_404();
		} else {
			if (empty($this->admin->readData('delivery', array('id' => $id)))) {
				show_404();
			} else {
				echo json_encode($this->admin->readData('delivery', array('id' => $id)));
			}
		}

	}

	public function editDeliveryData($id) {
		$this->form_validation->set_rules('deliver_warehouse_id', 'warehouse name', 'trim|required');
		$this->form_validation->set_rules('cargo_data_id', 'cargo', 'trim|required');
		$this->form_validation->set_rules('driver_id', ' Assigned driver', 'trim|required');
		$this->form_validation->set_rules('start_time', 'from date', 'trim|required');
		$this->form_validation->set_rules('end_time', 'to date', 'trim|required');
		$this->form_validation->set_rules('tracking_id', 'tracking_id', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			echo json_encode(array('error' => $errors));

		} else {

			$delivery_data = array(
				'deliver_warehouse_id' => $this->input->post('deliver_warehouse_id'),
				'cargo_data_id' => $this->input->post('cargo_data_id'),
				'driver_id' => $this->input->post('driver_id'),
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'tracking_id' => $this->input->post('tracking_id'));

			if ($this->admin->updateItem('delivery', $delivery_data, array('id' => $id))) {
				echo json_encode(array('success' => 'Form submitted successfully.'));
			} else {
				echo json_encode(array('error' => 'Form Not sent Or Changes not detected .'));

			}

		}

	}

	public function deleteDelivery($id) {
		$delivery_data = $this->admin->readData('delivery', array('id' => $id));
		if (!empty($delivery_data)) {
			$this->admin->updateItem('cargo', array('status' => 0), array('unique_name' => $delivery_data[0]->cargo_data_id));
			if ($this->admin->deleteItem('delivery', array('id' => $id))) {

				echo json_encode(array('success' => 'Delivery Deleted.'));
			}
		}

	}
	public function tracking() {
		$this->form_validation->set_rules('tracking_id', 'Tracking ID', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/tracking');
			$errors = validation_errors();
			json_encode(array('error' => $errors));
		} else {
			$data = $this->admin->readData('delivery', array('tracking_id' => $this->input->post('tracking_id')));

			if (!empty($data)) {
				$data1 = $this->admin->readData('cargo', array('unique_name' => $data[0]->cargo_data_id));
				$data_merge = array_merge($data, $data1);
				echo json_encode($data_merge);
			} else {
				echo json_encode(array('error' => 'Results Not Found'));
			}
		}
	}

}

/* End of file admins.php */
/* Location: ./application/controllers/admins.php */