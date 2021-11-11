<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Default action of the controller
	 * redirects to apps.
	 */
	public function index()
	{
		$this->go();
	}

	/**
	 * Get apps of a user 
	 * and show the view.
	 */
	public function go()
	{
		$this->checkAccess();
		$this->load->model('repository');
		$this->load->model('people');

		$word = isset($_REQUEST['word'])? $_REQUEST['word'] : "";

		$profiles =  $this->people->getProfilesLike($word);
		$repositories = $this->repository->getGlobalRepositoriesLike($word);
		$teams =  $this->people->getGlobalTeamsLike($word);

		$this->load->view('header',[
			"view" =>  $this->separate(["search",$word]),
			"title" =>  "search",
			"selected" => 0,
			"token" =>  $this->session->appig_token,
			"profiles" => $profiles,
			"repositories" => $repositories,
			"teams" => $teams,
			"me" => $this->session->appig_user,

		]);
		$this->load->view('search');
		$this->load->view('footer');
	}

	/**
	 * Check the token allows passing
	 * or redirects to the login view.
	 */
	public function checkAccess(){
		if($this->access->checkToken($this->session->appig_user,$this->session->appig_token) == false){
			redirect(base_url('index.php/Login/'));
			return false;
		}else return true;
	}

	/**
	 * Separate words with separator
	 */
	public function separate($words){
		return join(SEPARATOR,$words);
	}
}