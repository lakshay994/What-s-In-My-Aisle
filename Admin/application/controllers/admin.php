<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function login_post()
	{
		$uname = $this->input->post('uname');
		$pass = $this->input->post('password');

		

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('uname', 'username', 'required');
    	$this->form_validation->set_rules('password', 'password', 'required');

    	if($this->form_validation->run() == FALSE){
    		$this->load->view('login');
    	}
    	else{
    		if($uname == "admin" and $pass == "admin"){
    			redirect("http://localhost/CI/Admin/index.php/admin/home");
    		}
    		else{
    			
    			$error= array("error_msg" => "Wrong username or password!");
    			$this->load->view('login', $error);
    		}
    	}
	}

	public function home()
	{
		$this->load->view('home');
	}


############################################################################
#user
#############################################################################


	public function user()
	{
		$this->load->model('user_model');
        $data['user'] = $this->user_model->get_user_details();
		$this->load->view('user',$data);
	}

	public function delete_user()
	{
		$del_uid = $_GET['id'];
		$this->load->model('user_model');
		$data['user'] = $this->user_model->delete_user($del_uid);
		
		redirect('http://localhost/CI/Admin/index.php/admin/user');

	}

	public function edit_user()
	{
		$edit_uid = $_GET['id'];
		$this->load->model('user_model');
		$data['edit_user'] = $this->user_model->edit_user($edit_uid);
		$data['user'] = $this->user_model->get_user_details();
		$this->load->view('user',$data);
	}

	public function edit_user_post()
	{
		$signup_info = array( 
    		'fname' => $this->input->post('fname'),
    		'lname' => $this->input->post('lname'),
    		'email' => $this->input->post('email'),
    		'password' => $this->input->post('password')
    	);


    	$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('fname', 'First Name', 'required');
    	$this->form_validation->set_rules('lname', 'Last Name', 'required');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'Password', 'required');

    	if($this->form_validation->run()== FALSE){
    		$this->load->model('user_model');

			$data['user'] = $this->user_model->get_user_details();
			$data['edit_user'] = $this->user_model->edit_user($signup_info['email']);
			$this->load->view('user',$data);
    	}

    	else{

    		$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			$pass = md5($pass);

			$this->load->model('user_model');
	    	$data['user'] = $this->user_model->edit_user_save($fname,$lname,$email,$pass);
			
			redirect('http://localhost/CI/Admin/index.php/admin/user');
    	}
	}

	public function add_user()
	{

		$signup_info = array( 
    		'fname' => $this->input->post('fname'),
    		'lname' => $this->input->post('lname'),
    		'email' => $this->input->post('email'),
    		'password' => $this->input->post('password')
    	);


    	$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('fname', 'First Name', 'required');
    	$this->form_validation->set_rules('lname', 'Last Name', 'required');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'Password', 'required');

    	if($this->form_validation->run()== FALSE){
    		$this->load->model('user_model');

			$data['user'] = $this->user_model->get_user_details();
			$this->load->view('user',$data);
    	}
    	else{
    		$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			$pass = md5($pass);

			$this->load->model('user_model');
	    	$data['user'] = $this->user_model->add_user($fname,$lname,$email,$pass);
			
			redirect('http://localhost/CI/Admin/index.php/admin/user');
    	}
	}




############################################################################
#Location
#############################################################################





	public function location()
	{
		$this->load->model('location_model');
        $data['loc'] = $this->location_model->get_location_details();
		$this->load->view('location',$data);
	}


	public function delete_location()
	{
		$del_lid = $_GET['id'];
		$this->load->model('location_model');
		$data['loc'] = $this->location_model->delete_location($del_lid);
		
		redirect('http://localhost/CI/Admin/index.php/admin/location');

	}

	public function edit_location(){

		$edit_uid = $_GET['id'];
		$this->load->model('location_model');
		$data['edit_location'] = $this->location_model->edit_location($edit_uid);
		$data['loc'] = $this->location_model->get_location_details();
		$this->load->view('location',$data);
	}


	public function edit_location_post(){

		$Location = $this->input->post('location_id');

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('location', 'Location Name', 'required');

    	if($this->form_validation->run()== FALSE){
    		
    		$this->load->model('location_model');
    		$data['edit_location'] = $this->location_model->edit_location($Location);
	        $data['loc'] = $this->location_model->get_location_details();
			$this->load->view('location',$data);
    	}

    	else{
    		$Location_id = $this->input->post('location_id');
    		$Location_name = $this->input->post('location');

    		$this->load->model('location_model');
	    	$data['location'] = $this->location_model->edit_location_save($Location_id, $Location_name);
			
			redirect('http://localhost/CI/Admin/index.php/admin/location');

    	}
	}


	public function add_location()
	{

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('location', 'Location Name', 'required');

    	if($this->form_validation->run()== FALSE){
    		
    		$this->load->model('location_model');
	        $data['loc'] = $this->location_model->get_location_details();
			$this->load->view('location',$data);
    	}
    	else{
    		$lname = $this->input->post('location');
			$this->load->model('location_model');
			$this->location_model->add_location($lname);
			
			redirect('http://localhost/CI/Admin/index.php/admin/location');


    	}
		

	}



############################################################################
#asile
#############################################################################

	public function aisle()
	{
		$this->load->model('aisle_model');
		$data['aisle'] = $this->aisle_model->get_aisle_details();
		$data['locations'] = $this->aisle_model->get_locations();
		$this->load->view('aisle',$data);
	}

	public function delete_aisle()
	{
		$del_aid = $_GET['id'];
		$this->load->model('aisle_model');
		$data['aisle'] = $this->aisle_model->delete_aisle($del_aid);
		
		redirect('http://localhost/CI/Admin/index.php/admin/aisle');

	}

	public function edit_aisle()
	{
		$edit_aid = $_GET['id'];

		$this->load->model('aisle_model');
		$data['edit_aisle'] = $this->aisle_model->edit_aisle($edit_aid);
		$data['aisle'] = $this->aisle_model->get_aisle_details();
		$data['locations'] = $this->aisle_model->get_locations();

		$this->load->view('aisle',$data);
	}


	public function add_aisle_post()
	{

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('location_name', 'Location Name', 'required');
    	$this->form_validation->set_rules('aname','Aisle Name', 'required');
    
    	if($this->form_validation->run()== FALSE){
    		
    		$edit_aid = $this->input->post('aisle_id');

    		$this->load->model('aisle_model');
    		
			$data['aisle'] = $this->aisle_model->get_aisle_details();
			$data['locations'] = $this->aisle_model->get_locations();
			$data['edit_aisle'] = $this->aisle_model->edit_aisle($edit_aid);
			$this->load->view('aisle',$data);

    	}
    	else{

    		$aisleid = $this->input->post('aisle_id');
    		$lname = $this->input->post('location_name');
    		$aislename= $this->input->post('aname');

    		$this->load->model('aisle_model');
    		$this->aisle_model->edit_aisle_save($aisleid, $aislename, $lname);

    		redirect('http://localhost/CI/Admin/index.php/admin/aisle');


    	}

    	
	}

	public function add_aisle()
	{

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('location_name', 'Location Name', 'required');
    	$this->form_validation->set_rules('aname','Aisle Name', 'required');
    
    	if($this->form_validation->run()== FALSE){
    		
    		$this->load->model('aisle_model');
    		
			$data['aisle'] = $this->aisle_model->get_aisle_details();
			$data['locations'] = $this->aisle_model->get_locations();

			$this->load->view('aisle',$data);

    	}
    	else{

    		$lname = $this->input->post('location_name');
    		$aisleid= $this->input->post('aname');

    		$this->load->model('aisle_model');
    		$this->aisle_model->add_aisle($aisleid, $lname);

    		redirect('http://localhost/CI/Admin/index.php/admin/aisle');


    	}

    	
	}


############################################################################
#category
#############################################################################

	public function category()
	{
		$this->load->model('category_model');
		$data['category'] = $this->category_model->get_category_details();
		$this->load->view('category',$data);
	}

	public function delete_category()
	{
		$del_cid = $_GET['id'];
		$this->load->model('category_model');
		$data['category'] = $this->category_model->delete_category($del_cid);
		
		redirect('http://localhost/CI/Admin/index.php/admin/category');
	}

	public function edit_category(){

		$edit_cid = $_GET['id'];
		
		$this->load->model('category_model');
		$data['edit_category'] = $this->category_model->edit_category($edit_cid);
		$data['category'] = $this->category_model->get_category_details();

		$this->load->view('category',$data);
	}

	public function add_category_post()
	{

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('category', 'Category Name', 'required');
    	
    
    	if($this->form_validation->run()== FALSE){
    		
    		$edit_cid = $this->input->post('category_id');

    		$this->load->model('category_model');
    		$data['edit_category'] = $this->category_model->edit_category($edit_cid);
    		$data['category'] = $this->category_model->get_category_details();
			$this->load->view('category',$data);

    	}
    	else{

    		$edit_cid = $this->input->post('category_id');
    		$cname = $this->input->post('category');

    		$this->load->model('category_model');
    		$this->category_model->edit_category_save($edit_cid, $cname);

    		redirect('http://localhost/CI/Admin/index.php/admin/category');


    	}

    	
	}

	public function add_category()
	{

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('category', 'Category Name', 'required');

    	if($this->form_validation->run()== FALSE){
    		
    		$this->load->model('category_model');
	        $data['category'] = $this->category_model->get_category_details();
			$this->load->view('category',$data);

    	}
    	else{
    		
    			$cname = $this->input->post('category');
				$this->load->model('category_model');
				$this->category_model->add_category($cname);
		
				redirect('http://localhost/CI/Admin/index.php/admin/category');
		
    	}
	
	}


############################################################################
#item
#############################################################################

	public function item()
	{
		$this->load->model('item_model');
		$data['item'] = $this->item_model->get_item_details();
		$data['locations'] = $this->item_model->get_locations();
		$data['categories'] = $this->item_model->get_categories();
		
		$this->load->view('item',$data);
	}

	public function update_aisle_dropdown(){

		$lname = $_POST['location'];



		$this->load->model('item_model');
		
		$data = $this->item_model->get_aisles_of_location($lname);

		echo json_encode($data);


	}

	public function edit_item(){
		$itemid = $_GET['id'];

		$this->load->model('item_model');
		$data['item'] = $this->item_model->get_item_details();
		$data['locations'] = $this->item_model->get_locations();
		$data['categories'] = $this->item_model->get_categories();
		$data['edit_item'] = $this->item_model->edit_item($itemid);
		$this->load->view('item',$data);

	}

	public function add_items_post()
	{

		$name = $this->input->post('iname');
		$price = $this->input->post('pname');
		$desc = $this->input->post('ides');
		$location = $this->input->post('location_id');
		$aisle = $this->input->post('aisle_id');
		$category = $this->input->post('category_id');
		$itemid = $this->input->post('item_id');
		

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('iname', 'item name', 'required');
    	$this->form_validation->set_rules('pname', 'item price', 'required');
    	$this->form_validation->set_rules('ides', 'item description', 'required');
    	$this->form_validation->set_rules('location_id', 'item location', 'required');
    	$this->form_validation->set_rules('aisle_id', 'item aisle', 'required');
    	$this->form_validation->set_rules('category_id', 'item category', 'required');
    	

    	if($this->form_validation->run()== FALSE){

    		$this->load->model('item_model');
			$data['item'] = $this->item_model->get_item_details();
			$data['locations'] = $this->item_model->get_locations();
			$data['categories'] = $this->item_model->get_categories();
			$data['edit_item'] = $this->item_model->edit_item($itemid);
			$this->load->view('item',$data);
    		
		}
		else{

			$this->load->model('item_model');
			if(!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) 
			{

    		$image= file_get_contents($_FILES['image']['tmp_name']);
			
			}
			else{

				$image = $this->item_model->get_item_image($itemid);
			}
			
		
			
			$this->item_model->edit_item_save($itemid, $name, $price, $desc, $image, $category, $aisle,$location);

			redirect('http://localhost/CI/Admin/index.php/admin/item');

		}
		
	}

	public function add_items()
	{

		$name = $this->input->post('iname');
		$price = '$'.$this->input->post('pname');
		$desc = $this->input->post('ides');
		$location = $this->input->post('location_id');
		$aisle = $this->input->post('aisle_id');
		$category = $this->input->post('category_id');
		$image = file_get_contents($_FILES['image']['tmp_name']);

		$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    	$this->form_validation->set_rules('iname', 'item name', 'required');
    	$this->form_validation->set_rules('pname', 'item price', 'required|regex_match[/^[0-9]*$/]');
    	$this->form_validation->set_rules('ides', 'item description', 'required');
    	$this->form_validation->set_rules('location_id', 'item location', 'required');
    	$this->form_validation->set_rules('aisle_id', 'item aisle', 'required');
    	$this->form_validation->set_rules('category_id', 'item category', 'required');
    	

    	if($this->form_validation->run()== FALSE){

    		$this->load->model('item_model');
			$data['item'] = $this->item_model->get_item_details();
			$data['locations'] = $this->item_model->get_locations();
			$data['categories'] = $this->item_model->get_categories();
			$this->load->view('item',$data);
    		
		}
		else{


			$image = file_get_contents($_FILES['image']['tmp_name']);


			$this->load->model('item_model');
			$this->item_model->add_item($name, $price, $desc, $image, $category, $aisle, $location);

			redirect('http://localhost/CI/Admin/index.php/admin/item');

		}
		
	}


	public function delete_item()
	{
		$del_id = $_GET['id'];
		$this->load->model('item_model');
		$data['item'] = $this->item_model->delete_item($del_id);

		redirect('http://localhost/CI/Admin/index.php/admin/item');
	}
}

?>