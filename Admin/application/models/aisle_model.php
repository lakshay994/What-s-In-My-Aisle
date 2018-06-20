
<?php
    class aisle_model extends CI_Model
    {
        function get_locations()
        {

            $this->load->database();
            $query = $this->db->query("SELECT Location_Name from location");
            return $query->result_array(); 
        }
        
        function get_aisle_details()
        {
            $this->load->database();
            $query = $this->db->query("SELECT Aisle_Id, Aisle_Name, location.Location_Id, location.Location_Name from aisle, location where aisle.Location_Id = location.Location_Id");
            $query->result_array();
            return $query->result_array();           
        }
        
        function delete_aisle($del_aid)
        {


            $query = $this->db->query("

                    delete from item where item.Item_Id in (select * from (SELECT Item_Id from item, aisle WHERE item.Aisle_Id = aisle.Aisle_Id and item.Aisle_Id =".$del_aid.") as tbltmp)

                ");
            



        	$this->db->where('Aisle_Id', $del_aid);
            $del=$this->db->delete('aisle');   
           
            return $del;
        }

        function edit_aisle($edit_id)
        {
            $this->load->database();
            $query = $this->db->query("SELECT Aisle_Id, Aisle_Name, Location_Name from aisle, location WHERE aisle.Location_Id = location.Location_Id and aisle.Aisle_Id ='".$edit_id."'");

            $query->result_array();

            return $query->result_array(); 
        }

        function edit_aisle_save($aid, $aname,$lname)
        {

            $this->db->SELECT('Location_Id');
            $this->db->from('location');
            $this->db->where('Location_Name', $lname);

            $query = $this->db->get();
            if($query->num_rows()>0){
                $res1 = $query->result();
                $id = $res1[0]->Location_Id;
            }

            $data = array( 
                    'Aisle_Name'  =>  $aname,
                    'Location_Id' => $id
            );

            $this->db->where('aisle_Id', $aid);
            $this->db->update('aisle', $data);

        }

        function add_aisle($aname,$lname)
        {
            $this->db->SELECT('Location_Id');
            $this->db->from('location');
            $this->db->where('Location_Name', $lname);

            $query = $this->db->get();
            if($query->num_rows()>0){
                $res1 = $query->result();
                $id = $res1[0]->Location_Id;
            }

            $data = array( 
                    'Aisle_Name'  =>  $aname,
                    'Location_Id' => $id
            );

            $this->db->insert('aisle', $data);
        }
    } ?>



