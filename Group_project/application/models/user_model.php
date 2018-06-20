<?php

	class user_model extends CI_Model
	{
		function get_category_nav()
		{

			$this->load->database();
	        $query = $this->db->query("SELECT Category_Name from category");
	        return $query->result_array(); 
		}

		function get_locations()
		{

			$this->load->database();
	        $query = $this->db->query("SELECT Location_Name from location");
	        return $query->result_array(); 
		}

		function initial_getItems($currentCategory)
		{

			#get categoty id by name
			$this->db->select('Category_Id');
			$this->db->from('category');
			$this->db->where('Category_Name', $currentCategory);

			$query = $this->db->get();
			$result = $query->result();
			$id = $result[0]->Category_Id;			


			#select top 4 product
			$this->load->database();
	        $query = $this->db->query('select Item_Name, Item_Price, Item_Description, Item_Image, Location_Name, Aisle_Name from location, (select Item_Name, Item_Price, Item_Description, Item_Image, Location_Id, Aisle_Name from aisle, (select Item_Name, Item_Price, Item_Description, Item_Image, Aisle_Id from item where Category_Id ='.$id.' LIMIT 0,4) tbl where tbl.Aisle_Id = aisle.Aisle_Id) tbl1 where location.Location_Id = tbl1.Location_Id');

	        return $query->result_array();

			}

		
    	function get_search_items($search_data)
    	{
		

   
			$query = $this->db->query('select Item_Name, Item_Price, Item_Description, Item_Image, Location_Name, Aisle_Name from location, (select Item_Name, Item_Price, Item_Description, Item_Image, Location_Id, Aisle_Name from aisle, (select Item_Name, Item_Price, Item_Description, Item_Image, Aisle_Id from item ) tbl where  tbl.Aisle_Id = aisle.Aisle_Id and Item_Name LIKE   "%'  .$search_data. '%" COLLATE utf8_general_ci) tbl1 where location.Location_Id = tbl1.Location_Id ');
		
       			return $query->result_array();
       		
		}



		function get_search_items_by_location($search_data,$location)
    	{
		

			$query = $this->db->query('select Item_Name, Item_Price, Item_Description, Item_Image, Location_Name, Aisle_Name from location, (select Item_Name, Item_Price, Item_Description, Item_Image, Location_Id, Aisle_Name from aisle, (select Item_Name, Item_Price, Item_Description, Item_Image, Aisle_Id from item ) tbl where  tbl.Aisle_Id = aisle.Aisle_Id and Item_Name LIKE   "%'  .$search_data. '%" COLLATE utf8_general_ci) tbl1 where location.Location_Id = tbl1.Location_Id and Location_Name = "'.$location.'"');
		
       			return $query->result_array();
       		
			}
		
	}

?>