<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainC extends CI_Controller
{

	private $genres;

	function __construct()
	{
		parent::__construct();
		$this->load->model('booksM');
		$this->genres = $this->booksM->getGenres();
	}

	/**
	 * Default function 
	 */
	public function index()
	{
		$this->genre();
	}

	/**
	 * Load books of a genre 
	 * @param string $genre The genre to load
	 */
	public function genre($genre = false)
	{
		// Get data from models
		$books = $this->booksM->getBooksByGenre($genre);

		// Loads view 
		$this->load->view('headerV', ["genres" => $this->genres]);
		$this->load->view('booksV', ["genre" => $genre, "books" => $books]);
		$this->lend();
		$this->load->view('footerV');
	}

	
	/**
	 * draw calendar if date is given
	 */
	public function calendar($date = false)
	{
		// Loads view 
		$this->load->view('headerV', ["genres" => $this->genres]);

		if ($date !== false) {
		
			$dateBooks = $this->booksM->getLendsByDate($date);
			$this->load->view('calendarV', [
				'books' => $dateBooks,
				'date' => $date
			]);
		} else $this->load->view('calendarV', ['books' => []]);
	}

	/**
	 * Lend books if parameters are given
	 */
	private function lend()
	{
		if (isset($_POST['lend']) and isset($_POST['book'])) {
			$lendBooks = $_POST['book'];
			$lend = [];
			$notLend = [];

			foreach ($lendBooks as $book) {

				$bookLends = $this->booksM->getBookLends($book);
				$bookName = $this->booksM->getBookName($book);

				if ($bookLends < 4 and $this->booksM->lendBook($book))
					$lend[] = $bookName;
				else
					$notLend[] = $bookName;
			}

			
			$this->load->view('lendV', [
				'lend' => $lend,
				'notLend' => $notLend,
			]);
		}
		

	}

}
