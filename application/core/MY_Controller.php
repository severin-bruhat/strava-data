<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY Controller class
 */
class MY_Controller extends CI_Controller
{
    protected $data = [];

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * handle a master layout
     * @return [type] [description]
     */
    public function layout()
    {
        //$this->template['header'] = $this->load->view('templates/header', $this->data, true);
        //$this->template['footer'] = $this->load->view('templates/footer', $this->data, true);
        $this->template['page'] = $this->load->view($this->page, $this->data, true);
        $this->load->view('templates/main', $this->template);
    }
}
