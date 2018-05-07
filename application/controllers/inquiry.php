	<?php 


	Class Inquiry extends CI_Controller {

		public function __construct() {
			parent::__construct();
	// set the default timezone to use
			date_default_timezone_set('Asia/Colombo');
	// Load form helper library
			$this->load->helper('form');

	// Load form validation library
			$this->load->library('form_validation');

	// Load database
			$this->load->model('inquery_database');


		}

		public function index() {
			$this->load->view('admin_page');
		}


		public function view_inquiry($inquiry_status = 'all', $ordertype='ASC',$daterange) {
			if($daterange=='all'){
				$startdate = 'all';
				$enddate = 'all';
			}else{
				$daterange = explode("-", urldecode($daterange));
				$startdate = $daterange[0].'-'.$daterange[1].'-'.$daterange[2];
				$enddate = $daterange[3].'-'.$daterange[4].'-'.$daterange[5];
			}
			
			
			if(!isset($this->session->userdata['logged_in'])){
				
				$this->load->view('user_login');
			}else{
				$userid = $this->session->userdata['logged_in']['userid'];
				if ($inquiry_status == 'all') {
					$result = $this->inquery_database->show_inquiry($userid,$inquiry_status,$ordertype,$startdate,$enddate);
				} else if($inquiry_status == 'followup') {
					$result = $this->inquery_database->show_inquiry($userid,$inquiry_status,$ordertype,$startdate,$enddate);
				} elseif ($inquiry_status == 'register') {
					$result = $this->inquery_database->show_inquiry($userid,$inquiry_status,$ordertype,$startdate,$enddate);
				} elseif ($inquiry_status == 'success') {
					$result = $this->inquery_database->show_inquiry($userid,$inquiry_status,$ordertype,$startdate,$enddate);
				}
				

				if ($result == TRUE) {

					
			//print_r($result);
					foreach ($result as $key => $value) {
				//echo gettype($value);
						$result_success = $this->inquery_database->show_successByID($value->inquiryid);
						if($result_success != false){
							foreach ($result_success as $successkey => $successvalue) {
						//print_r($successvalue);

								$result[$key]->registercode = $successvalue->registrationcode.str_pad($successvalue->registernumber, 3, '0', STR_PAD_LEFT);
								$result[$key]->registerdate = $successvalue->dateofregister;
							}
						}
						
						
						
					}
					$data['result_display'] = $result;
					$data['recorde_order'] = $ordertype;

			//print_r($data);
					
		//$data['message_display'] = 'Registration Successfully !';
					$this->load->view('menu',$data);
					$this->load->view('inquiry_view_page', $data);
				} else {
					$data['result'] = 'No Record Found!';
					$this->load->view('menu');
					$this->load->view('inquiry_view_page', $data);
				}
			}
			


			
		}
	//insert new inquiry entry to the DB
		public function insert_inquiry(){
			if(!isset($this->session->userdata['logged_in'])){
				
				$this->load->view('user_login');
			}

			$this->form_validation->set_rules('name', 'Student Name', 'trim|required');
			$this->form_validation->set_rules('type', 'Inquiry Source', 'required');
			$this->form_validation->set_rules('programmeid', 'Programe Name', 'required');
			$this->form_validation->set_rules('contact', 'Student Contact Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Student Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('information', 'Comment', 'trim');
			if ($this->form_validation->run() == FALSE) {
				$result = $this->inquery_database->show_programme();

				if ($result == TRUE) {
					$data['programme'] = $result;
					$this->load->view('menu');
					$this->load->view('insert_inquiry_page',$data);
				} else {
					
				}
			} else {
				
				$data = array(
					'name' => $this->input->post('name'), 
					'type' => $this->input->post('type'), 
					'programmeid' => $this->input->post('programmeid'), 
					'contact' => $this->input->post('contact'), 
					'email' => $this->input->post('email'),
					'information' => $this->input->post('information'),
					'datetime' => date("Y-m-d H:i:s"), 
					'userid' => $this->session->userdata['logged_in']['userid'],
					'status' => 'none' 
					);
				$result = $this->inquery_database->insert_inquiry($data);
				if ($result == TRUE) {
					$result = $this->inquery_database->show_programme();
					$data['result'] = 'Inquiry Add Successfully';
					$data['programme'] = $result;	
					$this->load->view('menu');			
					$this->load->view('insert_inquiry_page',$data);
				} else {
					
				}
			}

		}
	//this function will use to control the page to view when user click the action link in query
		public function convert_inquiry($action,$id){
			if(!isset($this->session->userdata['logged_in'])){
				
				$this->load->view('user_login');
			}
			//need to change the validation
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				if(isset($this->session->userdata['logged_in'])){

					if($action == 'followup'){

						$result_followup = $this->inquery_database->show_followupByID($id);
						
								if($result_followup == 'NO FOLLOWUP'){//view fresh followup window
									$result_inquiry = $this->inquery_database->show_inquiryByID($id);
									if($result_inquiry != false){

										$row_inquiry = $result_inquiry->row();
										$result_programe = $this->inquery_database->show_programeByID($row_inquiry->programmeid);
										
										
										$data['result_inquiry'] = $row_inquiry;
										$data['result_programe'] = $result_programe;
										$this->load->view('menu');
										$this->load->view('followup_insert_page', $data);
									}
									
								}
								else if($result_followup !== false){//inquiry followed 
									$result_inquiry = $this->inquery_database->show_inquiryByID($id);
									if($result_inquiry != false){

										$row_inquiry = $result_inquiry->row();
										$result_programe = $this->inquery_database->show_programeByID($row_inquiry->programmeid);
										
										$data['result_followup'] = $result_followup;
										$data['result_inquiry'] = $row_inquiry;
										$data['result_programe'] = $result_programe;
										$this->load->view('menu');
										$this->load->view('followup_update_page', $data);
									}
								}else{//no inquiry found in the system
									$data['result'] = 'No Record Found for this Inquiry';
								}
								

								
							}
							else if ($action == 'register') {
								$result_inquiry = $this->inquery_database->show_inquiryByID($id);
								$row_inquiry = $result_inquiry->row();
								$result_programe = $this->inquery_database->show_programeByID($row_inquiry->programmeid);
								$result_intake = $this->inquery_database->show_intakes('active');
								$result_followup = $this->inquery_database->show_followupByID($id);
								$data['result_inquiry'] = $row_inquiry;
								$data['result_programe'] = $result_programe;
								$data['result_intake'] = $result_intake;
								$data['result_followup'] = $result_followup;
								$this->load->view('menu');
								$this->load->view('register_update_page',$data);
							}
							else if ($action =='success') {
								
								$result_inquiry = $this->inquery_database->show_inquiryByID($id);
								$row_inquiry = $result_inquiry->row();
								$result_programe = $this->inquery_database->show_programeByID($row_inquiry->programmeid);
								$result_followup = $this->inquery_database->show_followupByID($id);
								$result_register = $this->inquery_database->show_registerByID($id);
								$result_all_programe = $this->inquery_database->show_programme();
								$data['result_inquiry'] = $row_inquiry;
								$data['result_programe'] = $result_programe;
								$data['result_followup'] = $result_followup;
								$data['result_all_programe'] = $result_all_programe;
								$data['result_register'] = $result_register;
								$this->load->view('menu');
								$this->load->view('success_update_page',$data);
							}else{
								$this->load->view('user_login');
							}
							
						}
					}

				}
	// insert first follow up details
				public function insert_followup_inquiry(){
					if(!isset($this->session->userdata['logged_in'])){
						
						$this->load->view('user_login');
					}
					$this->form_validation->set_rules('followuponedescription', 'Follow up One Description', 'trim|required');
					$data_followup = array(
						'followuponedescription' => $this->input->post('followuponedescription'), 
						'inquiryid' => $this->input->post('inquiryid'), 
						'followuponedate' => date("Y-m-d H:i:s"),
						'followupstatus' => 'follow up one',  
						);
					$data_inquiry = array(
						'status' => 'follow up'
						);
					$result = $this->inquery_database->insert_followup($data_followup,$data_inquiry,$this->input->post('inquiryid'));
					if($result == true){
						$data['result'] = 'Inquiry Updated Successfully';
						$this->load->view('menu');
						$this->load->view('inquiry_view_page',$data);
					}
					else{
						$data['result'] = 'Error When Processing the Query';
						$this->load->view('menu');
						$this->load->view('inquiry_view_page',$data);
					}
				}
	//update inquiry with register
				public function update_register_inquiry(){
					if(!isset($this->session->userdata['logged_in'])){
						
						$this->load->view('user_login');
					}
			//print_r($this->input->post());
					$data = array(
						'registrationcode' => $this->input->post('intakecode'),
						'inquiryid' => $this->input->post('inquiryid'),
						'dateofregister' => date("Y-m-d H:i:s"), 
						);
					$year = date('o');
					$year = substr($year, -2);
					$inquiryid = $this->input->post('inquiryid');
					$result = $this->inquery_database->insert_register_inquiry($data,$inquiryid,$year);
					if($result == true){
						$data['result'] = 'Inquery Updated to Register Successfully';
						$this->load->view('menu');
						$this->load->view('inquiry_view_page',$data);
					}

				}
	//update inquiry with success 
				public function update_success_inquiry(){
					if(!isset($this->session->userdata['logged_in'])){
						$this->load->view('user_login');
					}
					$programeid = $this->input->post('programeid');
					$studytype = $this->input->post('studytype');
					$intake = $this->input->post('intake');
					$inquiryid = $this->input->post('inquiryid');
					$year = $this->input->post('year');
					$programedetail = $this->inquery_database->show_programeByID($programeid);
					
					$studentnumber = $programedetail[0]->abbrivation.$studytype.$intake.$year;
					$data = array(
						'frontcode' => $studentnumber,
						'inquiryid' => $this->input->post('inquiryid'),
						'dateofenrollment' => date("Y-m-d H:i:s"), 
						'frontcode' => $studentnumber, 
						);
					$result = $this->inquery_database->insert_success_inquiry($data,$inquiryid);
					if($result == true){
						$data['result'] = 'Inquery Updated to Success Successfully';
						$this->load->view('menu');
						$this->load->view('inquiry_view_page',$data);
					}
				//print_r($data);
					
				}

	//update inquiry with followup 2 and other 
				public function update_followup_inquiry(){
					if(!isset($this->session->userdata['logged_in'])){
						$this->load->view('user_login');

					}
					$this->form_validation->set_rules('followuptwodescription', 'Follow Up Two Description', 'trim');
					$this->form_validation->set_rules('other', 'Other Description', 'trim');
					
					if ($this->form_validation->run() == TRUE) {
						$inquiryid = $this->input->post('inquiryid');
					//follow up one already done follow up two need to update
						$followuptwodescription = $this->input->post('followuptwodescription');
						$other = $this->input->post('other');
						if(isset($other)) {
							$data = array(
								'other' => $this->input->post('other'),
								'followupstatus' => 'follow up two' 
								);
							//print_r($data);
						}else if (isset($followuptwodescription)) {
							$data = array(
								'followuptwodescription' => $this->input->post('followuptwodescription'),
								'followuptwodate' => date("Y-m-d H:i:s"),
								'followupstatus' => 'follow up two' 
								);
						} 
						
						$result =$this->inquery_database->update_followup_inquiry($data,$inquiryid);
						//echo $result;
						if($result==TRUE){
							$data['result'] = 'Follow Up Update Successfully';
						//$this->view_inquiry('followup');
							$this->load->view('menu');
							$this->load->view('inquiry_view_page',$data);
						}
						else{

						}

					}
				}


	//search options
				public function inqirysearch($inquiry_status = 'all') {
					$this->form_validation->set_rules('search', 'Search Description', 'trim|required');
					
					if ($this->form_validation->run() == TRUE) {

						if(!isset($this->session->userdata['logged_in'])){
							
							$this->load->view('user_login');
						}else{
							$result = true;
							$searchtype = $this->input->post('searchtype');
							$search = $this->input->post('search');
							if($searchtype == 'From Student Name'){
								$searchcolumn = 'name';
							}elseif ($searchtype == 'From Type') {
								
								$searchcolumn = 'type';
							}elseif ($searchtype == 'From Programe Name') {
								$result = $this->inquery_database->show_programmeByAbbrivation($search);
								if($result != false){
									$search = $result[0]->programeid;
									$searchcolumn = 'programmeid';
								}
								
							}
							if($result == true){
								$userid = $this->session->userdata['logged_in']['userid'];
								if ($inquiry_status == 'all') {
									$result = $this->inquery_database->search_inquiry($search,$inquiry_status,$searchcolumn);
								} 
							}
							else{
								$result = false;
							}
							
							

							if ($result == TRUE) {


					//print_r($result);
								foreach ($result as $key => $value) {
						//echo gettype($value);
									$result_success = $this->inquery_database->show_successByID($value->inquiryid);
									if($result_success != false){
										foreach ($result_success as $successkey => $successvalue) {
								//print_r($successvalue);

											$result[$key]->registercode = $successvalue->registrationcode.str_pad($successvalue->registernumber, 3, '0', STR_PAD_LEFT);
											$result[$key]->registerdate = $successvalue->dateofregister;
										}
									}



								}
								$data['result_display'] = $result;
						//print_r($result);

						//$data['message_display'] = 'Registration Successfully !';
								$this->load->view('menu');
								$this->load->view('inquiry_view_page', $data);
							} else {
								$data['result'] = 'No Record Found!';
								$this->load->view('menu');
								$this->load->view('inquiry_view_page', $data);
							}
						}
						


					}
					
					
					
				}

				public function summary_inquery() {
					/*$total_today_inquiries = $this->inquery_database->count_today_inquiry(date("Y-m-d"));
					$total_today_inquiries_byuser = $this->inquery_database->count_today_inquiryByUser(date("Y-m-d"),$this->session->userdata['logged_in']['userid']);
					
					
					$data['total_today_inquiries'] = $total_today_inquiries;
					$data['total_today_inquiries_byuser'] = $total_today_inquiries_byuser;*/

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
									//echo $innervalue->registerid;
									if(!empty($innervalue->registerid)){
										$result_summary[$abbrivation]['regcount']=$result_summary[$abbrivation]['regcount']+1;
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
				}


			}

	?>