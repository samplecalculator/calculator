<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Calculator_user_model extends CI_Model{
	/*
     //////////////////////////////////////////////////////////	
	 * function Construct
	 * gest from CI_Model
	 //////////////////////////////////////////////////////////
	*/
	public function __construct(){
		parent:: __construct();
	}
	/*
     //////////////////////////////////////////////////////////	
	 * function signin
	 * creates proper queries ['username'], persons username,
	 * creates proper queries ['password'], persons password,
	 * creat a get query [getting from table 'users' in db],
	 * check if number of rows != 0 rows
	 * then populate rows in @var dbrows
	 * @array information = @var dbrows -> rows from db['only name']
	 * once done.. set sessions using @param information;
	 * else return false.
	 *@param : @var username, @var password
	 * @return : 1 | 0;
	 //////////////////////////////////////////////////////////
	*/
	public function signin($username, $password){
		$this->db->where("username", $username);
		$this->db->where("password", $password);
		
		$qdb = $this->db->get("users");
		if($qdb->num_rows() > 0){
			foreach($qdb->result() as $dbrows){
				$information = array(
				'uid'  =>  $dbrows->uid,
				'username'	=>	$dbrows->username,
				'email'		=>	$dbrows->email,
				'isSignIn'	=>	TRUE	
				);
			}
			$this->session->set_userdata($information);
			return true;
		}
		return false;
	}
	/*
     //////////////////////////////////////////////////////////	
	 * function useradd
	 * creates @array data = key -> value pairs,
	 * inset into db using @param data where db == 'users'
	 *@reurns: 1;
	 //////////////////////////////////////////////////////////
	*/
	public function useradd(){
		$data = array(
		'username'	=>	$this->input->post(strtolower('username')),
		'email'		=>	$this->input->post('email'),
		'password'	=>	hash('sha512', $this->input->post('password'))
		);		
		$this->db->insert('users',$data);
		return true;
	}
	/*
     //////////////////////////////////////////////////////////	
	 * function record
	 * get db rows where @param == uid
	 *@returns: 1 = [rows];
	 //////////////////////////////////////////////////////////
	*/
	public function record($uid){
		$this->db->where("uid", $uid);
		return $this->db->get('users')->result();
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Developer Sergio Lema, All rights reserved v.0.2.9
	 //////////////////////////////////////////////////////////
	*/

}
