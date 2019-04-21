<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $username;
	//private $password;

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

	public function index() {

		$this->load->view('welcome/index');
	}

	public function login() {
		//form validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('welcome/login');
		} else {
			//checking username exist return true or false
			$username = $this->user->userAuth(array(
				'username=' => strtolower($this->input->post('username')),
			));
			// if true
			if ($username) {
				$password = $this->user->userAuth(array(
					'password=' => $this->input->post('password'),
				));
				//if username true and password true
				if ($password) {
					$user_data = $this->user->readUserData(array(
						'username' => $this->input->post('username'),
					));
					//user groups  and redirection point
					//drivers ==100 admin==900 warehouse=500
					if ($user_data[0]->access_level == 100) {
						$data = array(
							'uname' => $user_data[0]->username,
							'userid' => $user_data[0]->id,
							'access_level' => $user_data[0]->access_level,
						);
						$this->session->set_userdata('driver', $data);
						redirect('drivers/dashboard', 'refresh');

					} elseif ($user_data[0]->access_level == 500) {
						$data = array(
							'uname' => $user_data[0]->username,
							'address' => $user_data[0]->address,
							'userid' => $user_data[0]->id,
							'access_level' => $user_data[0]->access_level,
						);
						$this->session->set_userdata('warehouse', $data);
						redirect('warehouse/dashboard', 'refresh');

					} elseif ($user_data[0]->access_level == 900) {
						$data = array(
							'userid' => $user_data[0]->id,
							'uname' => $user_data[0]->username,
							'access_level' => $user_data[0]->access_level,
						);
						$this->session->set_userdata('admin', $data);
						redirect('admins/dashboard', 'refresh');

						//if credientials are correct but access level is not granted
					} else {
						$sess_data = array('type' => 'error', 'msg' => 'Access Denied');
						$this->session->set_flashdata('toastr', $sess_data);
						redirect('welcome/login');
					}
				} else {
					//if password is false

					$sess_data = array('type' => 'error', 'msg' => 'Incorrect Username Or Password');
					$this->session->set_flashdata('toastr', $sess_data);
					redirect('welcome/login');
				}
			} else {
				//if user name is false
				$sess_data = array('type' => 'error', 'msg' => 'Incorrect Username Or Password');
				$this->session->set_flashdata('toastr', $sess_data);
				redirect('welcome/login');
			}

		}

	}

	public function forgotPassword() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('welcome/login');
		} else {
			$data = $this->user->readUserData(array('email' => $this->input->post('email')));

			if (empty($data)) {
				$sess_data = array('type' => 'error', 'msg' => 'User Email Doesnt Exist');
				$this->session->set_flashdata('toastr', $sess_data);
			} else {
				$this->load->library('email');

				$this->email->from('caego11@gmail.com', 'CargoManagementSystem');
				$this->email->to($this->input->post('email'));

				$this->email->subject('Account Recovery');
				$msg = 'Dear User, Your Username Is ' . $data[0]->username . ' And  Your New Password Is' . $data[0]->password;
				$this->email->message($msg);

				$this->email->send();

				// $this->email->print_debugger();
				$sess_data = array('type' => 'success', 'msg' => 'Recovery Details Has Been Send Email');
				$this->session->set_flashdata('toastr', $sess_data);
			}

			redirect('welcome/login', 'refresh');
		}
	}

	public function logout() {
		session_unset();
		session_destroy();
		redirect('/login', 'refresh');
	}
} /* End of file welcome.php */; /* Location: ./application/controllers/welcome.php */
?>