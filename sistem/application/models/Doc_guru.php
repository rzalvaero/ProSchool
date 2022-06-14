<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_guru extends CI_Model {
 
    var $table = 'sr_users';
    var $column_order = array(null, 'SRU.u_nbm_nip','SRU.u_nuptk_nuks','US.first_name','SRU.u_tanggal_lahir','US.phone','US.email','sr_jabatan.nama_jabatan,SRU.status'); //set column field database for datatable orderable
    var $column_search = array('US.first_name',' SRU.u_nbm_nip'); //set column field database for datatable searchable 
    var $order = array('SRU.idusers' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	private function _get_datatables_query($term=''){ //term is value of $_REQUEST['search']['value']
		$column = array('US.first_name');
		$this->db->select('US.id, US.first_name, US.last_name,US.phone, US.email, SRU.u_nbm_nip, SRU.u_nuptk_nuks, SRU.u_tanggal_lahir,sr_jabatan.nama_jabatan,SRU.status');
		$this->db->from('users as US');
		$this->db->join('sr_users as SRU', 'SRU.idusers = US.id','left');
		$this->db->join('sr_jabatan', 'SRU.u_tugas_tambahan = sr_jabatan.id_jabatan','left');

        if($this->input->post('nbm'))
			{
				$this->db->where('SRU.u_nbm_nip', $this->input->post('nbm'));
			}
        
        if($this->input->post('nama'))
		    {
			    $this->db->like('US.first_name', $this->input->post('nama'));
		    }

        if($this->session->userdata('type_users')=="ADMIN"){ 
			if($this->input->post('unit'))
			{
				$this->db->where('SRU.unit', $this->input->post('unit'));
			}
		} else {
			$unit = $this->session->userdata('unit');
			$this->db->where('SRU.unit', $unit); 
		}

		foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
           // $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
		else if(isset($this->order))
		{
		   $order = $this->order;
		   $this->db->order_by(key($order), $order[key($order)]);
		}
	}
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
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
