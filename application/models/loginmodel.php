<?php 

// checking user Id existed in Database or not
class loginmodel extends CI_Model {
	public function user_login($user_name, $password)
	{
		$qry = 'SELECT user_id from login
				WHERE user_name = "'.@$user_name.'" AND password = "'.@$password.'" AND status_id!=2 ';
		$res = $this->db->query($qry);
		return $res->result();
	}
	public function user_details($user_id)
	{
		$qry = 'SELECT e.user_id as user_id,e.user_name as user_name,e.email as email,e.role_id as role_id, d.role_name as role_name from login e 
				INNER JOIN role d ON e.role_id=d.role_id 
				WHERE e.user_id = "'.@$user_id.'" ';
		$res = $this->db->query($qry);
		return $res->result();
	}

	public function forgot_login($user_name)
	{
		$qry = 'SELECT user_id from login
				WHERE email = "'.@$user_name.'"  ';
		$res = $this->db->query($qry);
		return $res->result();
	}
	public function reset_password($user_ids,$password)
	{
		$query='UPDATE login SET password="'.@$password.'" where user_id="'.@$user_ids.'" ';
		$this->db->query($query);
		return 1;
	}
	// creating new users
	public function create_users($dat)
	{
		$this->db->insert('login',$dat);
		

	}
	public function count($user_name, $password)
	{
		$qry = 'SELECT user_id from login
				WHERE user_name = "'.@$user_name.'" AND password = "'.@$password.'" ';
		$res = $this->db->query($qry);
		$count=	 $res->num_rows();
		return $count;
		
	}
	public function count1($email)
	{
		$qry = 'SELECT user_id from login
				WHERE email = "'.@$email.'"  ';
		$res = $this->db->query($qry);
		$count1=	 $res->num_rows();
		return $count1;
		
	}
}
?>