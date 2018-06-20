<?php
    class location_model extends CI_Model
    {
        
        function get_location_details()
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from location");
            $query->result_array();
            return $query->result_array();           
        }

        function delete_location($del_lid)
        {

            $query = $this->db->query("

                    delete from item WHERE Item_Id in (select * from (SELECT Item_Id from item WHERE Aisle_Id in (SELECT Aisle_Id FROM aisle WHERE Location_Id =".$del_lid.")) as TblTmp)

                ");
           

            $query1 = $this->db->query("delete from aisle where Location_Id = ".$del_lid );
          

            $this->db->where('Location_Id', $del_lid);
            $del=$this->db->delete('location');   
            return $del;
        }

        function edit_location($edit_id)
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from location where Location_Id='".$edit_id."'");
            $query->result_array();

            return $query->result_array(); 
        }

        function edit_location_save($Lid,$lname)
        {
             $data = array( 
                'Location_Id'  =>  $Lid,
                'Location_Name' => $lname               
                );

            $this->db->where('Location_Id', $Lid);
            $this->db->update('location', $data);

        }

        function add_location($lname)
        {
             $data = array( 
            'Location_Name'  =>  $lname);
             
            $this->db->insert('location', $data);
        }
        
    }
?>