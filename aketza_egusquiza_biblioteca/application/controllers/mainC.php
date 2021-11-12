<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainC extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('booksM');
	}

	/**
	 * Default function (Shows header and footer)
	 */
	public function index()
	{
		$genres = $this->booksM->getGenres();
		$this->load->view('headerV', ["genres" => $genres]);
		$this->load->view('footerV');
	}

	/**
	 * Load books of a genre 
	 * @param string $genre The genre to load
	 * @param string $date The date to load
	 */
	public function genre($genre = '', $date = '')
	{
		// Get data from models
		$genres = $this->booksM->getGenres();
		$books  = $this->booksM->getBooksByGenre($genre);

		// Loads view 
		$this->load->view('headerV', ["genres" => $genres]);
		$this->load->view('booksV', ["genre" => $genre, "books" => $books]);
		$this->calendar();
		$this->lend();
		$this->load->view('footerV');
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

	/**
	 * draw calendar if date is given
	 */
	private function calendar()
	{
		if (isset($_GET['date'])) {

			$date = $_GET['date'];
			$dateBooks = $this->booksM->getLendsByDate($date);
			$this->load->view('calendarV', [
				'books' => $dateBooks,
				'date' => $date
			]);
		} else $this->load->view('calendarV', ['books' => []]);
	}
}
