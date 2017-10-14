<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 25.09.2017
 * Time: 21:40
 */
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DbHandlers');
    }

    public function index()
    {
        $data['title'] = 'Список книг';

        $data['listBooks'] = $this->DbHandlers->getAllBooks();

        $this->load->view('template/header', $data);
        $this->load->view('pages/listBooks');
        $this->load->view('template/footer');
    }
}