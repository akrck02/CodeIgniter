<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LendsC extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('booksM');
	}

	public function index() {
		$genres = $this->booksM->getGenres();
		$lends = $this->booksM->getLends();
		
		$this->load->view('headerV', ["genres" => $genres]);
		$this->load->view('lendBooksV',["lends" => $lends]);
		$this->load->view('footerV');
	}

}
