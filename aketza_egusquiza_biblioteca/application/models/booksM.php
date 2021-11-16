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
        $query = $this->db->get();

        foreach ($query->result() as $row)
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
    function getBooksByGenre( $genre = false ){
        $books = [];

        $this->db->select('libros.idlibro, libros.titulo, autores.nombre');
        $this->db->from('libros');
        $this->db->join('autores','autores.idautor=libros.idautor');
       
        if($genre !== false)
            $this->db->where('genero',$genre);
       
        $query = $this->db->get();

        foreach ($query->result() as $row)
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
     * get lend number of the book
     * @param number $book book id
     * @return number number of lend book info
     */
    function getBookLends( $book ) {
        $this->db->select('idprestamo');
        $this->db->from('prestamos');
        $this->db->where('idlibro',$book);
        $this->db->get();
        return $this->db->affected_rows();
    }

    /**
     * lend book
     * @param number $book book id
     */
    function lendBook( $book ) {

        $params = [
            "fecha" =>  date('Y-m-d'),
            "idlibro" => $book
        ];

        $this->db->insert('prestamos',$params);
        return $this->db->affected_rows() >= 1;
    }

    /**
     * Get book name
     * @param $book The book id
     */
    function getBookName( $book ) {
        $this->db->select('titulo');
        $this->db->from('libros');
        $this->db->where('idlibro',$book);

        $query = $this->db->get();
        $result = $query->result();
        
        if(is_array($result) and $result[0]) 
            return $result[0]->titulo;
        else 
            return false;
    }

    /**
     * Get all the lends on a date
     * @param string $date The date to search for
     * @return array The lends
     */
    function getLendsByDate( $date ){
        $this->db->select('libros.titulo');
        $this->db->from('prestamos');
        $this->db->join('libros','libros.idlibro=prestamos.idlibro');
        $this->db->where('fecha', $date);
        $this->db->distinct();

        $lends = [];
        $query = $this->db->get();
        $result = $query->result();

        foreach($result as $row){
            $lends[] = $row->titulo;
        }

        return $lends;
    }

    /**
     * Get all the lends
     * @return array All the lends on database
     */
    function getAllLends(){
        $this->db->select('libros.titulo,libros.idlibro');
        $this->db->from('prestamos');
        $this->db->join('libros','libros.idlibro=prestamos.idlibro');
        $this->db->distinct();

        $lends = [];
        $query = $this->db->get();
        $result = $query->result();

        foreach($result as $row){
            $lends[$row->idlibro] = $row->titulo;
        }

        return $lends;
    }

    /**
     * Get the info of lends of a book
     * @param number $book The book id
     * @return array The book lends info
     */
    function getLendInfo( $book ){
        $this->db->select('idprestamo,idlibro,fecha');
        $this->db->from('prestamos');
        $this->db->where('idlibro', $book);
        $this->db->distinct();

        $lends = [];
        $query = $this->db->get();
        $result = $query->result();

        foreach($result as $row){
            $lends[] = [
                "id" => $row->idprestamo,
                "fecha" => $row->fecha
            ];
        }

        return $lends;
    }

    /**
     * Delete a lend form database 
     * @param number $lend the lend to delete
     * @return boolean if operation was successful
     */
    function deleteLend($lend){
        $this->db->where('idprestamo', $lend);
        $this->db->delete('prestamos');
        return $this->db->affected_rows() >= 1;
    }
}
?>