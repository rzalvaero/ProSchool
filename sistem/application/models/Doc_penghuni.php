<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doc_penghuni extends CI_Model
{

    var $table = 'sr_kamar_penghuni';
    var $column_order = array(null, 'id_penghuni', 'nama_kamar', 'status','sr_siswa as nama_siwa', 'wu.nama as nama_unit'); //set column field database for datatable orderable
    var $column_search = array('id_penghuni'); //set column field database for datatable searchable 
    var $order = array('id_penghuni' => 'ASC'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        $this->db->from('sr_kamar_penghuni as skp');
        $this->db->join('sr_kamar as sk', 'sk.id_kamar = skp.id_kamar','left');
        $this->db->join('sr_siswa as ss', 'ss.idsiswa = skp.id_siswa','left');
        $this->db->join('web_unit as wu', 'wu.id = skp.unit','left');

        //add custom filter here
        if($this->session->userdata('type_users')=="ADMIN"){ 
			if($this->input->post('unit'))
			{
				$this->db->where('skp.unit', $this->input->post('unit'));
			}
		} else {
			$unit = $this->session->userdata('unit');
			$this->db->where('skp.unit', $unit); 
		}

        if($this->input->post('kamar'))
        {
            $this->db->where('id_kamar', $this->input->post('kamar'));
        }

        // if($this->input->post('nisn'))
        // {
        //     $this->db->like('s_nisn', $this->input->post('nisn'));
        // }
        // if($this->input->post('nik'))
        // {
        //     $this->db->like('s_nik', $this->input->post('nik'));
        // }

        //$this->db->from($this->table);

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
