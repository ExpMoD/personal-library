<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.10.2017
 * Time: 22:04
 */
class AddBook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'Добавление книга';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'название книги', 'required',
            array('required' => 'Необходимо ввести %s.'));

        $this->form_validation->set_rules('author', 'автора', 'required',
            array('required' => 'Необходимо ввести %s.'));

        $this->form_validation->set_rules('date-read', 'дату прочтения',
            'required|regex_match[/\d{2}(-|\/|.)\d{2}(-|\/|.)\d{4}/]',
            array(
                'required' => 'Необходимо ввести %s.',
                'regex_match' => 'Дата введена не в верном формате'
            ));

        $this->form_validation->set_rules('cover', 'обложку', 'callback_uploadFileIsAllowed',
            array('uploadFileIsAllowed' => 'Расширение файла не поддерживается (jpg, png)'));


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('pages/addBook');
            $this->load->view('template/footer');
        } else {
            $this->load->model('DbHandlers');

            $postData = $this->input->post();
            $postData['date-read'] = date("Y-m-d", strtotime($postData['date-read']));
            $postData['cover-path'] = $this->uploadImg();

            if ($this->DbHandlers->addBook($postData)) {
                redirect('/addBook/success');
            } else {
                unlink($postData['cover-path']);
                redirect('/addBook/error');
            }
        }
    }

    public function success()
    {
        $data['title'] = 'Книга успешно добавлена';
        $data['message'] = 'Книга успешно добавлена';

        $this->load->view('template/header', $data);
        $this->load->view('messages/message', $data);
        $this->load->view('template/footer');
    }

    public function error()
    {
        $data['title'] = 'Книга не добавлена';
        $data['message'] = 'Книга не добавлена';

        $this->load->view('template/header', $data);
        $this->load->view('messages/message', $data);
        $this->load->view('template/footer');
    }

    public function uploadFileIsAllowed()
    {
        $allowedTypes = $this->config->item('allowed_img_types');

        foreach ($allowedTypes as $allowedType) {
            if ($allowedType['mime'] == $_FILES['cover']['type'])
                return TRUE;
        }

        return FALSE;
    }

    public function uploadImg()
    {
        $file = $_FILES['cover'];
        $imgInfo = pathinfo($file['name']);
        $uniqueName = uniqid(rand()) . "." . $imgInfo['extension'];
        $imgPath = $this->config->item('upload_path') . '/' . $uniqueName;

        $uploadPath = FCPATH . $imgPath;

        if (is_uploaded_file($file["tmp_name"])) {
            move_uploaded_file($file['tmp_name'], $uploadPath);
            return $imgPath;
        }

        return FALSE;
    }
}