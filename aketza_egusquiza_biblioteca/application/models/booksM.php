<?php
class BooksM extends CI_Model
{
 
    /**
     * Get all book genres
     * @return array assoc array of genre info 
     */
    function getGenres(){
        $categories = [];

        $this->db->select('genero');
        $this->db->from('libros');
        $this->db->distinct();        
        $res = $this->db->get();

        foreach ($res->result() as $row)
        {
            $categories[] = $row->genero;
        }

        return $categories;
    }

    /**
     * Get books from a genre
     * @param string $genre genre of the books
     * @return array assoc array of books info
     */
    function getBooksByGenre( $genre ){
        $books = [];

        $this->db->select('libros.idlibro, libros.titulo, autores.nombre');
        $this->db->from('libros');
        $this->db->join('autores','autores.idautor=libros.idautor');
        $this->db->where('genero',$genre);
        $res = $this->db->get();

        foreach ($res->result() as $row)
        {
            $books[] = [
                'id' => $row->idlibro,
                'author' => $row->nombre,
                'title' => $row->titulo,
            ];
        }

        return $books;
    }

    /**
     * get lends of the book
     * @param number $book book id
     * @return array assoc array of lend book info
     */
    function getBookLends( $book ) {

    }

    /**
     * lend book
     * @param number $book book id
     */
    function lendBook( $book ) {

    }

}
?>