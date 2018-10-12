<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Rangenilai_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('rangenilai', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_range_nilai) {
        $this->db->where('id_range_nilai', $id_range_nilai);
        $result = $this->db->get('rangenilai');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'range' => $this->input->post('range', TRUE),
           
            'nilai' => $this->input->post('nilai', TRUE),
           
            'bobot' => $this->input->post('bobot', TRUE),
           
            'minvalue' => $this->input->post('minvalue', TRUE),
           
            'maxvalue' => $this->input->post('maxvalue', TRUE),
           
            'method' => $this->input->post('method', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('rangenilai', $data);
    }

    function update($id_range_nilai) {
        $data = array(
        'id_range_nilai' => $this->input->post('id_range_nilai',TRUE),
       'range' => $this->input->post('range', TRUE),
       
       'nilai' => $this->input->post('nilai', TRUE),
       
       'bobot' => $this->input->post('bobot', TRUE),
       
       'minvalue' => $this->input->post('minvalue', TRUE),
       
       'maxvalue' => $this->input->post('maxvalue', TRUE),
       
       'method' => $this->input->post('method', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_range_nilai', $id_range_nilai);
        $this->db->update('rangenilai', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_range_nilai) {
        $this->db->where('id_range_nilai', $id_range_nilai);
        $this->db->delete('rangenilai'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_range_nilai, '.$value.' from rangenilai order by id_range_nilai asc');
        $result[0]="-- Pilih Urutan id_range_nilai --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_range_nilai]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
