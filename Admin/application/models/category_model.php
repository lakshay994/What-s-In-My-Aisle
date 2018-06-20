<?php
    class category_model extends CI_Model
    {
        
        function get_category_details()
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from category");
            $query->result_array();
            return $query->result_array();           
        }

        function delete_category($del_cid)
        {


            $query = $this->db->query("

                    delete from item where item.Item_Id in (select * from (SELECT Item_Id from item, category WHERE item.Category_Id = category.Category_Id and item.Category_Id =".$del_cid.") as tbltmp)

                ");
            

            $this->db->where('Category_Id', $del_cid);
            $del=$this->db->delete('category');   
            return $del;
        }

        function edit_category($edit_id)
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from category where Category_Id='".$edit_id."'");
            return $query->result_array();

        }

        function add_category($cname)
        {
        $data = array( 
        'Category_Name'  =>  $cname);
        $this->db->insert('category', $data);

        }

        function edit_category_save($edit_cid, $cname)
        {

            $data = array( 
                    'Category_Id' => $edit_cid,
                    'Category_Name'  =>  $cname
                    
            );

            $this->db->where('Category_Id', $edit_cid);
            $this->db->update('category', $data);

        }
        
    }
?>



