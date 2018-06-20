<?php 

	class login_model extends CI_Model
	{
		function get_user_details($data)
		{

			$whr = array('Email' => $data['Email'], 'Password' => $data['Password']);

			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($whr);
			
			$user_found = $this->db->get();

			if($user_found->num_rows() != 1)
			{

				$login_error = array("warning" => "Wrong Email or Password");
				
				$this->load->view('login', $login_error);
			}
			else{
				session_start();

				if(!isset($_SESSION['email']))
				{
					$_SESSION['email'] = $data['Email'];
				}

				redirect('http://localhost/CI/Group_project/index.php/user/home');
			}
				

		}	
	}
?>