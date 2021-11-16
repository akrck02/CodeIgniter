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

		if(isset($_POST['book'])) {
			$this->session->set_userdata(["book" => $_POST["book"]]);
			$this->loadLendLinks($lends, $_POST['book']);
		} 
		elseif ($this->session->has_userdata('book')) $this->loadLendLinks($lends, $this->session->book);
		else $this->load->view('lendBooksV',["lends" => $lends]);
		$this->load->view('footerV');
	}

	private function loadLendLinks($lends, $book){
		$lendsInfo = $this->booksM->getLendInfo($book);
		$this->load->view('lendBooksV',[
			"lends" => $lends,
			"book" => $book,
		]);
		$this->load->view('lendLinksV.php',["lends" => $lendsInfo,"erase" => $this->session->has_userdata('delete')]);
	}

	/**
	 * Delete lend from database
	 * @param string $id The lend id 
	 */
	public function delete($id = false){

		// delete the lend from database
		if($id !== false) 
			if($this->session->has_userdata('delete')) {
				$_SESSION['delete'][$id] = $id;
			} else {
				$_SESSION['delete'] = [];
				$_SESSION['delete'][$id] = $id;
			}

		
		// redirect to main page
		$this->index();
	}

	public function erase(){
		if($this->session->has_userdata('delete')) {
			foreach ($this->session->delete as $id) {
				$this->booksM->deleteLend($id);
			}
			$this->session->unset_userdata(['delete','book']);
		}
		$this->index();
	}

}
