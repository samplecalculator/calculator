<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calculator extends CI_Controller{
	/*
	 * Function constructor
	 * loads require models,helpers
	*/
	public function __construct(){
		parent::__construct();
		$this->load->model('calculator_user_model');
		$this->load->helper('html');
		$this->load->helper('form');
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Function index
	 * creates an array key ->  value and sets it equal to @var data, 
	 * gets the session value and sets it to @variable uid
	 * checks if the @var uid is not empty then call 
	 * @controller application(@var uid), 
	 * if empty we load the view
	 * @view default_view in our /views/default_view
	 * passing @var data to the @view
	 * @return none
	 * @param none
	 //////////////////////////////////////////////////////////
	 */
	public function index(){
		$data = array(
			'PageTitle' => ucfirst('calculator'). ' Application - Developed Dynamically',
			'sign_up'	=> ucfirst('sign up'),
			'sign_in'	=> ucfirst('sing in'),
			'form'		=> 'sign-up-form',
			'username'	=> array(
				'name'	=> 'username',
				'value'	=> ucfirst('pick a username'),
				'reg'	=> ucfirst('enter username')
			),
			'email'		=> array(
				'name'	=> 'email',
				'value' => ucfirst('your email'),
			),
			'password'	=> array(
				'name'	=> 'password',
				'value' => ucfirst('create a password'),
				'reg'	=> ucfirst('enter password')
			),
			'passwordconfirmation'	=> array(
				'name'	=> 'passwordconfirmation',
				'value' => ucfirst('confirm password'),
			),
			'submit'	=> array(
				'name'	=> 'submit',
				'value' => ucfirst('Sign up now!'),
			),
			'welcomePage' => array(
				'h1'	=> 'Calculator Applicaton - ',
				'h2'	=> 'Ready to work, Ready to use, and Enjoy!',
				'h3'	=> 'A graphical calculator that is interesting, creative, engaging, fun to use, and a is efficient and gets the right answers'
			)
		);
		$uid = $this->session->userdata('uid');
		if(($uid != '')){
			$this->application($uid);
		}else{ $this->load->view('default_view', $data); }
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Function signup
	 * loads library @lib form_validation
	 * sets rules for the input fields
	 * checks if @lib form_validation run successfully,
	 * if it did call to the @model useradd 
	 * then call the @controller signin,
	 * else call the @controller index, and test again
	 * @return none
	 * @param none
	 //////////////////////////////////////////////////////////
	 */
	public function signup(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'username',
			ucfirst('Username'), 
			'trim|required|min_length[8]|max_length[32]|xss_clean|alpha_numeric'
		);
		$this->form_validation->set_rules(
			'email',
			ucfirst('Email'),
			'trim|required|max_length[256]|xss_clean|valid_email'
		);
		$this->form_validation->set_rules(
			'password',
			ucfirst('password'),
			'trim|required|min_length[8]|max_length[32]|xss_clean|alpha_dash'
		);
		$this->form_validation->set_rules(
			'passwordconfirmation',
			ucfirst('confirm password'),
			'trim|required|min_length[8]|max_length[32]|xss_clean|alpha_dash|matches[password]'
		);
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$this->calculator_user_model->useradd();
			$this->signin();
		}		
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Function signin
	 * creates a @var encryption, username, password, response
	 * @var encryption = to encryption type
	 * @username = the post input name['username'] 
	 * @password = the post input name['password']
	 * @response = bool valid 'username' | 'password'
	 * Check if @response is true then 
	 * redirect to @controller application with @param uid,
	 * else load @controller index, and check again!
	 * @return none
	 * @param none
	 //////////////////////////////////////////////////////////
	 */
	public function signin(){
		$encryption = 'sha512';
		$username = $this->input->post('username');
		$password = hash($encryption, $this->input->post('password'));
		$response = $this->calculator_user_model->signin($username,$password);
		$uid = $this->session->userdata('uid');
		if($response == TRUE){
			redirect($this->application($uid));
		}else{ $this->index(); }
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Function signout
	 * creates an @array infomation = key -> value pairs,
	 * unsets the session values(@param information)
	 * destroys the session 
	 * redirects to the @controller index 
	 * @return none
	 * @param none;
	 //////////////////////////////////////////////////////////
	 */
	public function signout(){
		$information = array(
			'uid' => null,
			'username' => null,
			'email' => null,
			'isSignIn' => FALSE
		);
		$this->session->unset_userdata($information);
		$this->session->sess_destroy();
		redirect($this->index());
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Function application
	 * creates an @array data = key -> value pairs,
	 * checks if its the current user and has the same id
	 * then load @view application_view
	 * else redirect to @controller index.
	 * @return none
	 * @param uid : user identification
	 //////////////////////////////////////////////////////////
	 */
	public function application($uid){
			$data = array(
				'PageTitle' => ucfirst('calculator'). ' Application - Developed Dynamically',
				'signout'	=> ucfirst('Sign out'),
				'information' => $this->calculator_user_model->record($uid)
			);
			if(($this->session->userdata('username') != '') && $uid){
				$this->load->view('application/application_view', $data);
		}else{ redirect($this->index()); }		
	}
	/*
	 //////////////////////////////////////////////////////////
	 * Developer Sergio Lema, All rights reserved v.0.2.9
	 //////////////////////////////////////////////////////////
	*/
}
