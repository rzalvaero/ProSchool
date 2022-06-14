<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package Razorpay :  CodeIgniter Site
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Site Controller
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Model {
    private $_province;
    
    // set country id
    public function setProvID($province) {
        return $this->_province = $province;
    }

    public function getAllProv() {
        $this->db->select(array('c.province_id as id', 'c.province'));
        $this->db->from('sr_provinsi as c');
        $query = $this->db->get();
        return $query->result_array();
    }

    // get state method
    public function getStates() {
        $this->db->select(array('s.city_id', 's.province_id', 's.city_name','postal_code'));
        $this->db->from('sr_kota as s');
        $this->db->where('s.city_id', $this->province);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>