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

		if(isset($_POST['books'])){
			$lendsInfo = $this->booksM->getLendInfo($_POST['books']);
			$this->load->view('lendLinksV.php',["lends" => $lendsInfo]);
		}

		$this->load->view('footerV');
	}

}
