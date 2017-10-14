<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.10.2017
 * Time: 18:37
 */
class DbHandlers extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addBook($book)
    {
        return $this->db->insert('books', $book);
    }

    public function getAllBooks()
    {
        $this->db->select('*')
            ->from('books')
            ->order_by('date-read', 'DESC');

        $result = $this->db->get();

        return $result->result_array();
    }
}