<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.10.2017
 * Time: 22:32
 */
class ImportFromXml extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'xml'));
    }

    public function index()
    {
        $data['title'] = 'Импортировать из xml';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('xml-file', 'xml-файл', 'callback_uploadFileIsAllowed',
            array('uploadFileIsAllowed' => 'Данное расширение не поддерживается'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('pages/importFromXml');
            $this->load->view('template/footer');
        } else {
            $this->load->model('DbHandlers');

            $tmpName = $_FILES['xml-file']['tmp_name'];

            if (is_uploaded_file($tmpName)) {
                $xmlFile = file_get_contents($_FILES['xml-file']['tmp_name']);

                $xmlArray = XMLtoArray($xmlFile);


                if (!empty($xmlArray) && isset($xmlArray['BOOKS']['BOOK'])) {
                    $countAddBooks = 0;
                    $allBooksCount = count($xmlArray['BOOKS']['BOOK']);


                    if (isset($xmlArray['BOOKS']['BOOK'][0])) {
                        foreach ($xmlArray['BOOKS']['BOOK'] as $book) {
                            $newBook = array(
                                'name' => $book['NAME'],
                                'author' => $book['AUTHOR'],
                                'date-read' => date("Y-m-d", strtotime($book['DATE-READ'])),
                                'cover-path' => 0
                            );

                            if ($this->DbHandlers->addBook($newBook))
                                $countAddBooks++;
                        }
                    } else {
                        $newBook = array(
                            'name' => $xmlArray['BOOKS']['BOOK']['NAME'],
                            'author' => $xmlArray['BOOKS']['BOOK']['AUTHOR'],
                            'date-read' => date("Y-m-d", strtotime($xmlArray['BOOKS']['BOOK']['DATE-READ'])),
                            'cover-path' => 0
                        );

                        $allBooksCount = 1;
                        if ($this->DbHandlers->addBook($newBook))
                            $countAddBooks++;
                    }


                    redirect('importFromXml/success?all=' . $allBooksCount . '&add=' . $countAddBooks);
                }
            }

            redirect('importFromXml/error');
        }
    }


    public function success()
    {
        $data['title'] = 'Добавлены новые книги';
        $data['message'] = 'Всего добавлено: ' . $_GET['add'] . ' из ' . $_GET['all'] . '!';

        $this->load->view('template/header', $data);
        $this->load->view('messages/message', $data);
        $this->load->view('template/footer');
    }

    public function error()
    {
        $data['title'] = 'Произошла ошибка при загрузки файла';
        $data['message'] = 'Произошла ошибка при загрузки файла';

        $this->load->view('template/header', $data);
        $this->load->view('messages/message', $data);
        $this->load->view('template/footer');
    }

    public function uploadFileIsAllowed()
    {
        $allowedTypes = ['text/xml'];

        foreach ($allowedTypes as $allowedType) {
            if ($_FILES['xml-file']['type'] == $allowedType)
                return TRUE;
        }

        return FALSE;
    }
}