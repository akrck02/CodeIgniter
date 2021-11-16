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

		if(isset($_POST['books'])) {
			$this->session->set_userdata(["books" => $_POST["books"]]);
			$this->loadLendLinks($lends, $_POST['books']);
		} 
		elseif ($this->session->has_userdata('books')) $this->loadLendLinks($lends, $this->session->books);
		else $this->load->view('lendBooksV',["lends" => $lends]);
		$this->load->view('footerV');
	}

	private function loadLendLinks($lends, $books){
		$lendsInfo = $this->booksM->getLendInfo($books);
		$this->load->view('lendBooksV',[
			"lends" => $lends,
			"book" => $books,
		]);
		$this->load->view('lendLinksV.php',["lends" => $lendsInfo]);
	}

	/**
	 * Delete lend from database
	 * @param string $id The lend id 
	 */
	public function delete($id = false){

		// delete the lend from database
		if($id !== false) 
			
		//$this->booksM->deleteLend($id);
		// redirect to main page
		$this->index();
	}
}
