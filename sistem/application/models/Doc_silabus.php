<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doc_silabus extends CI_Model
{

    var $table = 'sr_silabus';
    var $column_order = array(null, 'kompetensi_dasar', 'indikator_kd', 'materi_pembelajaran_kd', 'kegiatan_pembelajaran_kd', 'tk_kd', 'bi_kd', 'in_kd', 'alokasi', 'sumber'); //set column field database for datatable orderable
    var $column_search = array('alokasi'); //set column field database for datatable searchable 
    var $order = array('idsilabus' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        //add custom filter here
        if ($this->session->userdata('type_users') == "ADMIN") {
            if ($this->input->post('unit')) {
                $this->db->where('unit', $this->input->post('unit'));
            }
        } else {
            $unit = $this->session->userdata('unit');
            $this->db->where('unit', $unit);
        }

        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
