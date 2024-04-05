<?php
	class User_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('users', $data);
			return true;
		}

		public function get_all_users(){
			$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name  FROM `users`;");
			return $result = $query->result_array();
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('users', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_user($data, $id){
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


	public function resolve_user_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	public function hash_password($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}
	
	
	public function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}

	public function get_user_id_from_username($email) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('id');
		
	}
	
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	}

?>