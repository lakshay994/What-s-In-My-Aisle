<?php 

	class signup_model extends CI_Model
	{
		function add_user_details($data)
		{
			foreach ($data as $key => $value) {
				if($key == "Email"){
					$email = $value;
				}
			}

			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email',$email);

			$user_found = $this->db->get();

			if($user_found->num_rows() > 0)
			{
				$user_present = array("warning" => "Email address already excist. Try with different one or login");

				$this->load->view('signup', $user_present);
			}
			else{
				$this->db->insert('user', $data);
			}
			
		}


	}
?>