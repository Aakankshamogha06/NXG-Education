<?php
	class Auth_model extends CI_Model{

		public function login($data){
			$email=$data['email'];
			//$query = $this->db->get_where('users', array('email' => $data['email']));
			$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin)as role_name FROM `users` where email='$email'");
		
			if ($query->num_rows() == 0){
				return false;
			}
			else{
				//Compare the password attempt with the password we have stored.
				$result = $query->row_array();
			    $validPassword = password_verify($data['password'], $result['password']);
			    if($validPassword){
			        return $result = $query->row_array();
			    }
				
			}
		}
		public function register($data)
		{
			$this->db->insert('users', $data);
			return $this->db->affected_rows() > 0;
		}
		
		public function change_pwd($data, $id){
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			return true;
		}
		public function role_fetch()
		{
			
			$role_data = $this->db->query("SELECT * FROM `role`");
	
			$fetch = $role_data->num_rows();
			if ($fetch > 0) {
				return $fetch = $role_data->result_array();
				
			} else {
				return false;
			}
		}
	}

?>