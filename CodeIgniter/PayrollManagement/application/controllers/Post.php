<?php

class Post extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('post_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['post'] = $this->post_model->get_post();
                $data['title'] = 'Post archive';

                $this->load->view('templates/header', $data);
                $this->load->view('post/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['post_item'] = $this->post_model->get_post($slug);

                if (empty($data['post_item']))
                {
                        show_404();
                }

                $data['title'] = $data['post_item']['SUMMARY'];

                $this->load->view('templates/header', $data);
                $this->load->view('post/view', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a post item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('post/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->post_model->set_post();
                $this->load->view('post/success');
            }
        }
}