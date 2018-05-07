<?php


Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();
// set the default timezone to use
date_default_timezone_set('Asia/Colombo');
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load database
$this->load->model('login_database');
$this->load->model('inquery_database');
}

// Show login page
public function index() {
$this->load->view('user_login');
}

// Show registration page
public function user_registration_show() {
$this->load->view('registration_form');
}

// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	if ($this->form_validation->run() == FALSE) {
	$this->load->view('registration_form');
	} else {
	$data = array(
	'user_name' => $this->input->post('username'),
	'user_email' => $this->input->post('email_value'),
	'user_password' => $this->input->post('password')
	);
	$result = $this->login_database->registration_insert($data);
	if ($result == TRUE) {
	$data['message_display'] = 'Registration Successfully !';
	$this->load->view('login_form', $data);
	} else {
	$data['message_display'] = 'Username already exist!';
	$this->load->view('registration_form', $data);
	}
	}
}

// Check for user login process
public function user_login_process() {

	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');

	if ($this->form_validation->run() == FALSE) {
		if(isset($this->session->userdata['logged_in'])){
			
		$this->load->view('admin_page');
		}else{
		$this->load->view('user_login');
		}
	} else {
	$data = array(
	'username' => $this->input->post('username'),
	'password' => $this->input->post('password')
	);
	$result = $this->login_database->login($data);
	if ($result == TRUE) {

	$username = $this->input->post('username');
	$result = $this->login_database->read_user_information($username);
		if ($result != false) {
			$session_data = array(
			'userid' => $result[0]->userid,
			'username' => $result[0]->username,
			'type' => $result[0]->type,
			);
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);
			//for manager level information
			//$total_today_inquiries = $this->inquery_database->count_today_inquiry(date("Y-m-d"));
			//$total_today_inquiries_byuser = $this->inquery_database->count_today_inquiryByUser(date("Y-m-d"),$this->session->userdata['logged_in']['userid']);
			
			
			//$data['total_today_inquiries'] = $total_today_inquiries;
			//$data['total_today_inquiries_byuser'] = $total_today_inquiries_byuser;
			//
			//pending check with inquery view summary_inquery()
			//$inquiry_summary_byuser = $this->inquery_database->inquiry_report_summaryByUser($this->session->userdata['logged_in']['userid']);
			//$this->load->view('admin_page',$data);
			/////////////////////////////////////////////////////////////////////////////////////////////
			$inquiry_summary_byuser = $this->inquery_database->inquiry_report_summaryByUser($this->session->userdata['logged_in']['userid']);
					$inquiry = $this->inquery_database->inquiry_receivedByUser($this->session->userdata['logged_in']['userid']);
					$user_target = $this->inquery_database->user_target($this->session->userdata['logged_in']['userid']);
					//print_r($inquiry);
					$result_summary = array();
					foreach ($inquiry as $key => $value) {
						foreach ($inquiry_summary_byuser as $innerkey => $innervalue) {
							if($value->inquiryid == $innervalue->inquiryid){
								if(!isset($result_summary[$innervalue->abbrivation])){
									$abbrivation = $innervalue->abbrivation;
									$result_summary[$abbrivation]['programeid'] =$innervalue->programmeid;
									$result_summary[$abbrivation]['inquirycount'] = 1;
									$result_summary[$abbrivation]['regcount']=0; 
									$result_summary[$abbrivation]['successcount']=0;
									echo $innervalue->registerid;
									if(!empty($innervalue->registerid)){
										echo $result_summary[$abbrivation]['regcount']=$result_summary[$abbrivation]['regcount']+1;
									}
									if(!empty($innervalue->studentid)){
										$result_summary[$abbrivation]['successcount']=$result_summary[$abbrivation]['successcount']+1;
									}
									
								}else if(isset($result_summary[$abbrivation])){
									$abbrivation = $innervalue->abbrivation;
									$result_summary[$abbrivation]['programeid'] =$innervalue->programmeid;
									$result_summary[$abbrivation]['inquirycount'] = $result_summary[$abbrivation]['inquirycount']+1;
									
									if(!empty($innervalue->registerid)){
										$result_summary[$abbrivation]['regcount']=$result_summary[$abbrivation]['regcount']+1;
									}
									if(!empty($innervalue->studentid)){
										$result_summary[$abbrivation]['successcount']=$result_summary[$abbrivation]['successcount']+1;
									}
								}
							}
						
						
						}
						

					}
					//print_r($result_summary);
					$data['inquiry_summary_byuser'] = $result_summary;
					$data['user_target'] = $user_target;
					
					
					$this->load->view('admin_page',$data);
			////////////////////////////////////////////////////////////////////////////////////////////
		}
	} else {
	$data = array(
	'error_message' => 'Invalid Username or Password'
	);
	$this->load->view('user_login', $data);
	}
	}
}

// Logout from admin page
public function logout() {

// Removing session data
	$sess_array = array(
	'username' => ''
	);
	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('user_login', $data);
}

}

?>