<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LendsC extends CI_Controller
{

	private $genres;

	function __construct()
	{
		parent::__construct();
		$this->load->model('booksM');
		$this->genres = $this->booksM->getGenres();
		
	}

	/**
	 * Default function (Shows header and footer)
	 */
	public function index() {
	
		$lends = $this->booksM->getAllLends();
		
		$this->load->view('headerV', ["genres" => $this->genres]);
		

		if(isset($_POST['books'])){
			$lendsInfo = $this->booksM->getLendInfo($_POST['books']);
			$this->load->view('lendBooksV',[
				"lends" => $lends,
				"book" => $_POST['books'],
			]);
			$this->load->view('lendLinksV.php',["lends" => $lendsInfo]);
		} else {
			$this->load->view('lendBooksV',["lends" => $lends]);
		}
		$this->load->view('footerV');
	}

	/**
	 * Delete lend from database
	 * @param string $id The lend id 
	 */
	public function delete($id = false){

		// delete the lend from database 

		// redirect to main page
		$this->index();
	}
}
