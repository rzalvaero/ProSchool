<?php
defined('BASEPATH') OR 
    exit('No direct script access allowed');
/**
 * Version: 1.0.0
 *
 * Description of News model
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 **/

// News class
class Doc_forum extends CI_Model {
  // Declare variables
  private $_limit;
  private $_pageNumber;
  private $_offset;

  public function setLimit($limit) {
        $this->_limit = $limit;
    }

    public function setPageNumber($pageNumber) {
        $this->_pageNumber = $pageNumber;
    }

    public function setOffset($offset) {
        $this->_offset = $offset;
    }

  // Count all record of table "news" in database.
  public function getAllNewsCount() {
        $this->db->from('sr_materi');
        return $this->db->count_all_results();
    }
  // Fetch data according to per_page limit.
  public function newsList() {       
        $this->db->select(array('sr.id', 'sr.unit', 'sr.judul', 'sr.konten', 'sr.file', 'sr.video', 'sr.tgl_posting'));
        $this->db->from('sr_materi as sr');          
        $this->db->limit($this->_limit, $this->_offset);
        $query = $this->db->get();
        return $query->result_array();
    }

}
