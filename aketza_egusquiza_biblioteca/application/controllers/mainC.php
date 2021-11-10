<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainC extends CI_Controller {

	public function index()
	{
		$this->load->model('booksM');
		$genres = $this->booksM->getGenres();
		$genre = isset($_GET['genre']) ? $_GET['genre'] : "";
		$books = $this->booksM->getBooksByGenre($genre);

		$this->load->view('headerV', ["genres" => $genres]);
		$this->load->view('lendV', ["books" => $books]);
		$this->load->view('footerV');
	}
}
