<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/auth_model', 'auth_model');
	}

	public function index()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			redirect('admin/dashboard');
		} else {
			redirect('admin/auth/login');
		}
	}

	public function login()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/auth/login');
			} else {
				$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);
				$result = $this->auth_model->login($data);
				if ($result == TRUE) {
					$admin_data = array(
						'admin_id' => $result['id'],
						'username' => $result['username'],
						'name' => $result['firstname'] . '&nbsp;' . $result['lastname'],
						'role' => $result['is_admin'],
						'role_name' => $result['role_name'],
						'is_admin_login' => TRUE

					);
					$this->session->set_userdata($admin_data);
					redirect(base_url('admin/dashboard'), 'refresh');
				} else {
					$data['msg'] = 'Invalid Email or Password!';
					$this->load->view('admin/auth/login', $data);
				}
			}
		} else {
			$this->load->view('admin/auth/login');
		}
	}
	public function register()
	{
		if ($this->input->post('submit')) {
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/auth/register');
			} else {
				$data = array(
					'username' => $this->input->post('firstname').' '.$this->input->post('lastname'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_admin' => $this->input->post('user_role'),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
					$result = $this->auth_model->register($data);
	
				if ($result) {
					redirect('admin/auth/login');
				} else {
					$data['msg'] = 'Registration failed!';
					$this->load->view('admin/auth/register', $data);
				}
			}
		} else {
			$this->load->view('admin/auth/register');
		}
	}
	
	public function change_pwd()
	{
		$id = $this->session->userdata('admin_id');
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/auth/change_pwd';
				$this->load->view('admin/layout', $data);
			} else {
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$result = $this->auth_model->change_pwd($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('admin/auth/change_pwd'));
				}
			}
		} else {
			$data['view'] = 'admin/auth/change_pwd';
			$this->load->view('admin/layout', $data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin/auth/login'), 'refresh');
	}

} // end class


?>