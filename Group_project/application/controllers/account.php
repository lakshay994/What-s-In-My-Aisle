<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {

	


	public function index()
    {
       $this->load->view('index');
    }


    public function signup()
    {
    	$this->load->view('signup');
    }

    public function signup_post()
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
    		$this->load->view('signup');
    	}
    	else{

    		$insert_data = array( 
    		'Fname' => $this->input->post('fname'),
    		'Lname' => $this->input->post('lname'),
    		'Email' => $this->input->post('email'),
    		'Password' => $this->input->post('password')
    		);

            $insert_data['Password'] = md5($insert_data['Password']);

    		$this->load->model('signup_model');
    		$this->signup_model->add_user_details($insert_data);
    		
    		$success = array("success_msg" => "Account has been created successfully. Now you may login!");

    		
    		$this->load->view('index', $success);
    	}
    }

	
	public function login()
	{
		$this->load->view('login');
	}

	public function login_post()
	{
		$login_info = array(    		
    		'email' => $this->input->post('email'),
    		'password' => $this->input->post('password')
    	);



    	$this->load->library('form_validation');

    	$this->form_validation->set_error_delimiters('<div class="error">','</div>');

    
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'Password', 'required');

    	if($this->form_validation->run()== FALSE){
    		$this->load->view('login');
    	}
    	else{

    		$login_info_chk = array(    		
    		'Email' => $this->input->post('email'),
    		'Password' => $this->input->post('password')
    		);

            $login_info_chk['Password'] = md5($login_info_chk['Password']);

    		$this->load->model('login_model');
    		$this->login_model->get_user_details($login_info_chk);

    		#$this->load->view('home');

    		
    	}
	}

	
}

