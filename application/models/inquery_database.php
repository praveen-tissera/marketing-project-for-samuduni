<?php 



Class Inquery_Database extends CI_Model {

public function show_inquiry($userid,$inquery_status,$ordertype,$startdate,$enddate) {
	
	//select inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other from inquiry LEFT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)
	if($inquery_status == 'all'){
		if($startdate == 'all' || $enddate =='all'){
			$condition = "userid =" . "'" . $userid . "' ORDER BY inquiry.datetime " . $ordertype;	
		}else {
			 $condition = "userid =" . "'" . $userid . "' AND inquiry.datetime BETWEEN'" . $startdate . "' AND '" . $enddate ." 23:59:59' ORDER BY inquiry.datetime " . $ordertype;
		}
		

		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry LEFT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
	} elseif ($inquery_status == 'followup') {
		//select inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other from inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid) WHERE userid=1 AND inquiry.status='follow up' ORDER BY inquiry.datetime ASC

		//$condition = "userid =" . "'" . $userid . "' AND inquiry.status='follow up'  ORDER BY inquiry.datetime " . $ordertype;
		$condition = "userid =" . "'" . $userid . "' AND inquiry.status='follow up' AND inquiry.datetime BETWEEN'" . $startdate . "' AND '" . $enddate ." 23:59:59' ORDER BY inquiry.datetime " . $ordertype;
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
	} elseif ($inquery_status == 'register') {
		$condition = "userid =" . "'" . $userid . "' AND inquiry.status='info' AND inquiry.datetime BETWEEN'" . $startdate . "' AND '" . $enddate ." 23:59:59' ORDER BY inquiry.datetime " . $ordertype;
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
	} elseif ($inquery_status == 'success') {
		$condition = "userid =" . "'" . $userid . "' AND inquiry.status='success' AND inquiry.datetime BETWEEN'" . $startdate . "' AND '" . $enddate ." 23:59:59' ORDER BY inquiry.datetime " . $ordertype;
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
	}
	

	if ($query->num_rows() > 0) {
	return $query->result();
	} else {
	return false;
	}
}

	public function show_programme(){
		$this->db->select('*');
		$this->db->from('programe');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		return $query->result();
		} else {
		return false;
		}

	}
	public function show_programmeByAbbrivation($abbrivation){
			$condition = "abbrivation =" . "'" . $abbrivation . "' LIMIT 1";
			$this->db->select('*');
			$this->db->from('programe');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();	
			}else{
				return false;
			}

	}

	
	
	public function insert_inquiry($data){
		$this->db->insert('inquiry',$data);

		if ($this->db->affected_rows() > 0) {
		return true;
		} else {
		return false;
		}

	}

	public function show_inquiryByID($inquiryid){
		//get inquiry details from inquiry table
			$condition = "inquiryid =" . "'" . $inquiryid . "' LIMIT 1";
			$this->db->select('*');
			$this->db->from('inquiry');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query;	
			}else{
				return false;
			}
			
			
	}
	//SELECT COUNT(*) AS follow FROM `followup` WHERE inquiryid = 1
	public function show_followupByID($inquiryid){
		if($this->show_inquiryByID($inquiryid) != false){

			$condition = "inquiryid =" . "'" . $inquiryid . "' LIMIT 1";
			$this->db->select('COUNT(*) AS follow');
			$this->db->from('followup');
			$this->db->where($condition);
			$query = $this->db->get();
			$row = $query->row();
			if ($row->follow == 1) {
				
				//get followup details from followup table
				$condition = "inquiryid =" . "'" . $inquiryid . "' LIMIT 1";
				$this->db->select('*');
				$this->db->from('followup');
				$this->db->where($condition);
				$query = $this->db->get();	
				return $query->result();
			} else {//inquiry found but has not done followup yet
				
				return 'NO FOLLOWUP';
			}
		}
		else{//no inquiry found
			return false;
		}
		

	}
	
	public function show_programeByID($programeid){
		//get programe details from programe table
			
			$condition = "programeid =" . "'" . $programeid . "' LIMIT 1";
			$this->db->select('*');
			$this->db->from('programe');
			$this->db->where($condition);
			$query = $this->db->get();
			return $query->result();
	}
	//
	public function insert_followup($data_followup,$data_inquiry,$inquiryid){
		$this->db->trans_start();
		$this->db->insert('followup',$data_followup);
		$this->db->where('inquiryid', $inquiryid);

		$this->db->update('inquiry', $data_inquiry);

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
			 $this->db->trans_rollback();
				
		        return false;
		}
		else{
			$this->db->trans_commit();
			return true;	
		}
		
		/*if ($this->db->affected_rows() > 0) {
		return true;
		} else {
		return false;
		}*/

	}

	public function show_intakes($status){
			$condition = "status ='".$status."'";
			$this->db->select('*');
			$this->db->from('intake');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return false;
			}
			
	}
	public function insert_register_inquiry($data,$inquiryid,$year){
		//SELECT registernumber FROM `registration` WHERE registrationcode = '17SP' ORDER BY registernumber DESC LIMIT 1
		//SELECT registernumber FROM `registration` WHERE registrationcode LIKE '17%' ORDER BY registernumber DESC LIMIT 1
			$condition = "registrationcode LIKE '".$data['registrationcode']."%' ORDER BY registernumber DESC LIMIT 1";
			$this->db->select('registernumber');
			$this->db->from('registration');
			$this->db->where($condition);
			$query = $this->db->get();
			//print_r($query->num_rows());
			if ($query->num_rows() > 0) {
				$this->db->trans_start();
				//return $query->result();
				$result = $query->row();
				$newregisternumber = $result->registernumber + 1;
				$data['registernumber'] = $newregisternumber;
				$this->db->insert('registration',$data);
				$data = array('status' => 'info');
				$this->db->where('inquiryid', $inquiryid);
				$this->db->update('inquiry', $data);
				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE){
					 $this->db->trans_rollback();
					 return false;
				}
				else{
					$this->db->trans_commit();
					return true;	
				}
			}
			elseif ($query->num_rows() == 0) {

				$this->db->trans_start();
				$newregisternumber = 1;
				
				//$registernumber = array('registernumber' => $newregisternumber);
				$data['registernumber'] = $newregisternumber;
				
				$this->db->insert('registration',$data);


				$data = array('status' => 'info');
				$this->db->where('inquiryid', $inquiryid);
				$this->db->update('inquiry', $data);

				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE){
					 $this->db->trans_rollback();
					 return false;
				}
				else{
					$this->db->trans_commit();
					return true;	
				}
			}else{
				return false;
			}
	}


public function insert_success_inquiry($data,$inquiryid){
		//SELECT registerid FROM `success` WHERE studentcode = 'CBTFF17' ORDER BY registerid DESC LIMIT 1
			$condition = "frontcode ='".$data['frontcode']."' ORDER BY generateid DESC LIMIT 1";
			$this->db->select('generateid');
			$this->db->from('success');
			$this->db->where($condition);
			$query = $this->db->get();
			//print_r($query->num_rows());
			if ($query->num_rows() > 0) {
				$this->db->trans_start();
				//return $query->result();
				$result = $query->row();
				$newsuccessnumber = $result->generateid + 1;
				$data['generateid'] = $newsuccessnumber;
				$data['studentsuccesscode'] = $data['frontcode'].str_pad($newsuccessnumber, 3, '0', STR_PAD_LEFT);
				$this->db->insert('success',$data);
				$data = array('status' => 'success');
				$this->db->where('inquiryid', $inquiryid);
				$this->db->update('inquiry', $data);
				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE){
					 $this->db->trans_rollback();
					 return false;
				}
				else{
					$this->db->trans_commit();
					return true;	
				}
			}
			elseif ($query->num_rows() == 0) {
				
				$this->db->trans_start();
				$newsuccessnumber = 1;
				
				//$registernumber = array('registernumber' => $newregisternumber);
				$data['generateid'] = $newsuccessnumber;
				
				$data['generateid'] = $newsuccessnumber;
				$data['studentsuccesscode'] = $data['frontcode'].str_pad($newsuccessnumber, 3, '0', STR_PAD_LEFT);
				//print_r($data);
				$this->db->insert('success',$data);
				
				$data = array('status' => 'success');
				$this->db->where('inquiryid', $inquiryid);
				$this->db->update('inquiry', $data);

				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE){
					 $this->db->trans_rollback();
					 return false;
				}
				else{
					$this->db->trans_commit();
					return true;	
				}
			}else{
				return false;
			}
	}


	//get success details by inquiry id
	public function show_successByID($inquiryid){
			$condition = "inquiryid ='".$inquiryid."'";
			$this->db->select('*');
			$this->db->from('registration');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return false;
			}
	}
	//update follow up two  or other descriptiona and followup status
	public function update_followup_inquiry($data_followup,$inquiryid){
		//print_r($data_followup);
		$this->db->where('inquiryid', $inquiryid);
		$this->db->update('followup', $data_followup);
		if ($this->db->affected_rows() > 0) {
		return TRUE;
		} else {
		return FALSE;
		}
	}

	public function show_registerByID($inquiryid){
		//SELECT * FROM `registration` WHERE inquiryid = 1
		$condition = "inquiryid ='".$inquiryid."'";
		$this->db->select('*');
		$this->db->from('registration');
		$this->db->where($condition);
		$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return false;
			}
	}
//search inquiry by criteria
	public function search_inquiry($userid,$inquery_status,$searchcolumn) {
	
	//select inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other from inquiry LEFT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)
	if($inquery_status == 'all'){
		$condition = $searchcolumn . " LIKE " . "'%" . $userid . "%' ORDER BY inquiry.datetime ASC";
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry LEFT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
	} elseif ($inquery_status == 'followup') {
		//select inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other from inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid) WHERE userid=1 AND inquiry.status='follow up' ORDER BY inquiry.datetime ASC

		$condition = "userid =" . "'" . $userid . "' AND inquiry.status='follow up'  ORDER BY inquiry.datetime ASC";
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
	} elseif ($inquery_status == 'register') {
		$condition = "userid =" . "'" . $userid . "' AND inquiry.status='info'  ORDER BY inquiry.datetime ASC";
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
	} elseif ($inquery_status == 'success') {
		$condition = "userid =" . "'" . $userid . "' AND inquiry.status='success'  ORDER BY inquiry.datetime ASC";
		$this->db->select('inquiry.inquiryid,inquiry.name,inquiry.type,programe.programename,inquiry.contact,inquiry.email,inquiry.information,inquiry.datetime,inquiry.status,followup.followupstatus,followup.followuponedate,followup.followuponedescription,followup.followuptwodate,followup.followuptwodescription,followup.other');
		$this->db->from('inquiry RIGHT JOIN followup ON(inquiry.inquiryid = followup.inquiryid ) LEFT JOIN programe ON (inquiry.programmeid = programe.programeid)');
		$this->db->where($condition);
		
		$query = $this->db->get();
	}
	

	if ($query->num_rows() > 0) {
	return $query->result();
	} else {
	return false;
	}
}


public function count_today_inquiry($date){
	//SELECT COUNT(*) as inquirycount FROM `inquiry` WHERE datetime='2017-08-14'
		$condition = "datetime ='".$date."'";
		$this->db->select('COUNT(*) as inquirycount');
		$this->db->from('inquiry');
		$this->db->where($condition);
		$query = $this->db->get();
			
		return $query->result();
			

}

public function count_today_inquiryByUser($date,$userid){
	//SELECT COUNT(*) as inquirycount FROM `inquiry` WHERE datetime='2017-08-14' AND userid=1
		$condition = "datetime ='".$date."' AND userid ='".$userid."'";
		$this->db->select('COUNT(*) as inquirycount');
		$this->db->from('inquiry');
		$this->db->where($condition);
		$query = $this->db->get();
			
		return $query->result();
}

public function inquiry_report_summaryByUser($userid){
	//SELECT inquiry.inquiryid, programe.abbrivation, inquiry.programmeid,registration.registerid,success.studentid FROM `inquiry` RIGHT JOIN programe ON(inquiry.programmeid = programe.programeid) LEFT JOIN registration ON(registration.inquiryid = inquiry.inquiryid) LEFT JOIN success ON(success.inquiryid = inquiry.inquiryid) WHERE inquiry.userid=1 ORDER BY programe.abbrivation ASC

	$condition = "inquiry.userid ='".$userid."' ORDER BY programe.abbrivation ASC";
		$this->db->select('inquiry.inquiryid, programe.abbrivation, inquiry.programmeid,registration.registerid,success.studentid');
		$this->db->from('`inquiry` RIGHT JOIN programe ON(inquiry.programmeid = programe.programeid) LEFT JOIN registration ON(registration.inquiryid = inquiry.inquiryid) LEFT JOIN success ON(success.inquiryid = inquiry.inquiryid)');
		$this->db->where($condition);
		$query = $this->db->get();
			
		return $query->result();
}

public function inquiry_receivedByUser($userid){
		$condition = "userid ='".$userid."'";
		$this->db->select('*');
		$this->db->from('inquiry');
		$this->db->where($condition);
		$query = $this->db->get();
			
		return $query->result();
}

public function user_target($userid){
		$condition = "userid ='".$userid."' AND year ='".date('Y') ."'" ;
		$this->db->select('*');
		$this->db->from('target');
		$this->db->where($condition);
		$query = $this->db->get();
			
		return $query->result();
}

}

?>