<?php
defined('BASEPATH') OR 
  exit('No direct script access allowed');
/**
 * Version: 1.0.0
 *
 * Description of News Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 **/

// News class
class Forum extends CI_Controller {
  //Load libraries in Constructor.
  public function __construct() {
        parent::__construct();        
        $this->load->library('pagination');
        $this->load->model('Doc_forum', 'forum');

    }
  // index method
  public function index() {
        $data['metaDescription'] = 'Load more data on page scroll using jQuery, Ajax and Codeigniter';
        $data['metaKeywords'] = 'Load more data on page scroll using jQuery, Ajax and Codeigniter';
        $data['title'] = "Load more data on page scroll using jQuery, Ajax and Codeigniter - TechArise";
        $data['breadcrumbs'] = array('Load more data on page scroll using jQuery, Ajax and Codeigniter' => '#');
        $this->load->view('forum', $data);
    }
    // load data
    public function loadData() {
        $data = array();
        $config['total_rows'] = $this->forum->getAllNewsCount();
        $this->forum->setLimit($this->input->post('limit'));
        $this->forum->setOffset($this->input->post('start'));
        $data['dataInfo'] = $this->forum->newsList();       
        $this->output->set_header('Content-Type: application/json');
        $this->load->view('forum', $data);
    }
}
?>