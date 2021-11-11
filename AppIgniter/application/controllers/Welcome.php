<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->checkAccess()) return;
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	}

	
	public function checkAccess(){
		if($this->access->checkToken($this->session->appig_user,$this->session->appig_token)){
			redirect(base_url('index.php/app/'));
			return true;
		}
	}
}
