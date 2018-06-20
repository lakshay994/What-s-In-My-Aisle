<?php
    class item_model extends CI_Model
    {

        function get_locations()
        {

            $this->load->database();
            $query = $this->db->query("SELECT Location_Name from location");
            return $query->result_array(); 
        }
        function get_categories()
        {

            $this->load->database();
            $query = $this->db->query("SELECT Category_Name from category");
            return $query->result_array(); 
        }

        function edit_item($itemid){

           
            $this->load->database();
            $query = $this->db->query("SELECT Item_Id, Item_Name, Item_Price, Item_Description, Item_Image, Category_Name, Aisle_Name, Location_Name  FROM item, aisle, location, category  WHERE Item_id =".$itemid." and item.Aisle_Id = aisle.Aisle_Id and location.Location_Id = aisle.Location_Id and category.Category_Id=item.Category_Id");

            $query->result_array();

            return $query->result_array(); 
        }

        function edit_item_save($itemid, $iname, $iprice, $idesc,  $iimage, $icategory, $iaisle, $Location_Name){

            $this->db->SELECT('Location_Id');
            $this->db->from('location');
            $this->db->where('Location_Name', $Location_Name);

            $query3 = $this->db->get();
            if($query3->num_rows()>0){
                $res3 = $query3->result();
                $lid = $res3[0]->Location_Id;
            }
           
            $this->db->SELECT('Aisle_Id');
            $this->db->from('aisle');
            $this->db->where('Aisle_Name', $iaisle);
            $this->db->where('Location_Id', $lid);

            $query = $this->db->get();
            if($query->num_rows()>0){
                $res1 = $query->result();
                $aid = $res1[0]->Aisle_Id;
            }

            $this->db->SELECT('Category_Id');
            $this->db->from('category');
            $this->db->where('Category_Name', $icategory);

            $query1 = $this->db->get();
            if($query1->num_rows()>0){
                $res2 = $query1->result();
                $cid = $res2[0]->Category_Id;
            }

          
            $data = array(
                'Item_Name' => $iname,
                'Item_Price' => $iprice,
                'Item_Description' => $idesc,
                'Item_Image' => $iimage,
                'Category_Id' => $cid,
                'Aisle_Id' => $aid
            );

             $this->db->where('Item_Id', $itemid);
            $this->db->update('item', $data);


        }

        function add_item($iname, $iprice, $idesc,  $iimage, $icategory, $iaisle, $Location_Name){


            $this->db->SELECT('Location_Id');
            $this->db->from('location');
            $this->db->where('Location_Name', $Location_Name);

            $query3 = $this->db->get();
            if($query3->num_rows()>0){
                $res3 = $query3->result();
                $lid = $res3[0]->Location_Id;
            }

           
            $this->db->SELECT('Aisle_Id');
            $this->db->from('aisle');
            $this->db->where('Aisle_Name', $iaisle);
            $this->db->where('Location_Id', $lid);

            $query = $this->db->get();
            if($query->num_rows()>0){
                $res1 = $query->result();
                $aid = $res1[0]->Aisle_Id;
            }

            $this->db->SELECT('Category_Id');
            $this->db->from('category');
            $this->db->where('Category_Name', $icategory);

            $query1 = $this->db->get();
            if($query1->num_rows()>0){
                $res2 = $query1->result();
                $cid = $res2[0]->Category_Id;
            }

          
            $data = array(
                'Item_Name' => $iname,
                'Item_Price' => $iprice,
                'Item_Description' => $idesc,
                'Item_Image' => $iimage,
                'Category_Id' => $cid,
                'Aisle_Id' => $aid
            );

             $this->db->insert('item', $data);


        }

        function get_aisles_of_location($lname)
        {

            $this->db->SELECT('Location_Id');
            $this->db->from('location');
            $this->db->where('Location_Name', $lname);

            $query = $this->db->get();
            if($query->num_rows()>0){
                $res1 = $query->result();
                $id = $res1[0]->Location_Id;
            }

            $query1 = $this->db->query("SELECT Aisle_Name FROM `aisle` WHERE Location_Id =". $id);

            $query1->result_array();

            return $query1->result_array(); 
        }
        
        function get_item_details()
        {
            $this->load->database();
            $query = $this->db->query("SELECT * from item");
            $query->result_array();
            return $query->result_array();           
        }
        
        function delete_item($del_id)
        {
            $this->db->where('Item_Id', $del_id);
            $del=$this->db->delete('item');   
            return $del;
        }

        function get_item_image($id){

            $this->db->SELECT('Item_Image');
            $this->db->from('item');
            $this->db->where('Item_Id', $id);

            $query = $this->db->get();
            if($query->num_rows()>0){
                $res1 = $query->result();
                $image = $res1[0]->Item_Image;
            }

            return $image;
        }
    }
?>