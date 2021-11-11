<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->checkAccess()) return;
		$this->load->view('header',[
			"view" => "Login",
			"title" => "Login"
		]);
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function checkLogin(){
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$this->load->model('access');

		#Check DDBB and login
		$token = $this->access->checklogin($username,$password);
		if($token){
			$_SESSION['appig_user']  = $username;
			$_SESSION['appig_token']  = $token;
			redirect('/app/', 'refresh');
		}else{
			$this->load->view('header',[
				"view" => "Login",
			]);
			$this->load->view('login',[
				"error" => "Incorrect user or password."
			]);
			$this->load->view('footer');
		}

	}

	public function checkAccess(){
		if($this->access->checkToken($this->session->appig_user,$this->session->appig_token)){
			redirect(base_url('index.php/app/'));
			return true;
		}
	}

}
