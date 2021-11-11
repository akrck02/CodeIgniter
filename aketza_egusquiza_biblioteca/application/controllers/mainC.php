<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainC extends CI_Controller
{

	public function index()
	{
		// Load model
		$this->load->model('booksM');

		// Get GET/POST parameters
		$genre = isset($_REQUEST['genre']) ? $_REQUEST['genre'] : "";

		// Get data from models
		$genres = $this->booksM->getGenres();
		$books  = $this->booksM->getBooksByGenre($genre);

		// Loads view 
		$this->load->view('headerV', ["genres" => $genres]);
		$this->load->view('booksV', ["genre" => $genre, "books" => $books]);

		// If lends are send upload them to the database and send feedback
		if (isset($_POST['lend']) and isset($_POST['book'])) {
			$lendBooks = $_POST['book'];
			$lend = [];
			$notLend = [];

			foreach ($lendBooks as $book) {

				$bookLends = $this->booksM->getBookLends($book);
				$bookName = $this->booksM->getBookName($book);
				
				if($bookLends < 4 and $this->booksM->lendBook($book))
					$lend[] = $bookName;
				else
					$notLend[] = $bookName;
				
			}

			$this->load->view('lendV',[
				'lend' => $lend,
				'notLend' => $notLend,
			]);
		}

		$this->load->view('footerV');
	}
}
