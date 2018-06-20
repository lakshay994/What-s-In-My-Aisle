<?php
    class user_model extends CI_Model
    {
        
        function get_user_details()
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from user");
            $query->result_array();
            return $query->result_array();           
        }
        
        function delete_user($del_uid)
        {
            $this->db->where('Email', $del_uid);
            $del=$this->db->delete('user');   
            return $del;
        }

        function edit_user($edit_id)
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from user where Email='".$edit_id."'");
            $query->result_array();

            return $query->result_array(); 
        }

        function edit_user_save($fname,$lname,$email,$pass)
        {
            $data = array( 
                'Fname'  =>  $fname,
                'Lname' => $lname,
                'Email' => $email,
                'Password' => $pass
                );

            $this->db->where('Email', $email);
            $this->db->update('user', $data);
        }

        function add_user($fname,$lname,$email,$pass)
        {
             $data = array( 
        'Fname'  =>  $fname,
        'Lname' => $lname,
        'Email' => $email,
        'Password' => $pass
        );
             
        $this->db->insert('user', $data);

        }
    }
?>

