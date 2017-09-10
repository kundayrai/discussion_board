<?php
class Discussion extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('discussion_model');
        }

        public function index()
        {
                $this->load->helper('url');

                $data['discussion'] = $this->discussion_model->get_content();
                $data['title'] = 'Discussion Board';

                $this->load->view('templates/header', $data);
                $this->load->view('discussion/index', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');

                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('content', 'Comment', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        echo '<script language="javascript">';
                        echo 'alert("Please enter all the details")';
                        echo '</script>';

                        $data['discussion'] = $this->discussion_model->get_content();
                        $data['title'] = 'Discussion Board';

                        $this->load->view('templates/header', $data);
                        $this->load->view('discussion/index');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->discussion_model->set_comment();

                        $data['discussion'] = $this->discussion_model->get_content();
                        $data['title'] = 'Discussion Board';

                        $this->load->view('templates/header', $data);
                        $this->load->view('discussion/index', $data);
                        $this->load->view('templates/footer');
                }
        }
}