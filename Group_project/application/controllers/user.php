<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {




  	public function home(){
  		
      $this->load->model('user_model');
      $data['categories'] = $this->user_model->get_category_nav();
      $data['page'] = 'home';
  		$this->load->view('home',$data);
  	}

    public function logout()
    {
       session_start();
       
       if(isset($_SESSION['email'])){
       	session_unset($_SESSION['email']);
       }

       $this->load->view('index');

    }





    public function category()
    {
      
      $currentCategory = $_GET['cname'];

      
      $this->load->model('user_model');

      $data['categories'] = $this->user_model->get_category_nav();
      $data['item_details'] = $this->user_model->initial_getItems($currentCategory);      
      $data['page'] = $currentCategory;
      $data['locations'] = $this->user_model->get_locations();
      $this->load->view('category',$data);

      /*$currentURL = current_url();
            $params   = $_SERVER['QUERY_STRING'];


            $fullURL = $currentURL . '?' . $params;
            print_r($fullURL);
*/

    }




    
      public function search_post()
      {

       
        $search_data =  $this->input->post('search');
       
      


        $this->load->model('user_model');
         $data['categories'] = $this->user_model->get_category_nav();
          $data['item_details'] = $this->user_model->get_search_items($search_data);
        $data['page'] = "";
        $data['locations'] = $this->user_model->get_locations();
        
        $this->load->view('category',$data);

      }
      

     
        

        public function post_data()
        {

         

          $search_data =  $this->input->post('search');
           $loc_data =  $this->input->post('loc');
           
          

          $this->load->library('form_validation');
          $this->form_validation->set_rules('loc', 'loc', 'required');
          

          if($this->form_validation->run()== FALSE){


            $this->load->model('user_model');
            $data['categories'] = $this->user_model->get_category_nav();
            $data['item_details'] = $this->user_model->get_search_items($search_data);
            $data['page'] = $search_data;
            $data['page'] = $loc_data;  
         
            $data['locations'] = $this->user_model->get_locations();
          
            $this->load->view('category',$data);

            
          }

          else
          {
           
           $this->load->model('user_model');
         $data['categories'] = $this->user_model->get_category_nav();
          $data['item_details'] = $this->user_model->get_search_items_by_location($search_data,$loc_data);
        $data['page'] = " ";
        $data['locations'] = $this->user_model->get_locations();
        
        $this->load->view('category',$data);
         }
       }

}


  
?>
