<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Bobot_saw_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('bobot_saw', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_bobot) {
        $this->db->where('id_bobot', $id_bobot);
        $result = $this->db->get('bobot_saw');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
            'bobot' => $this->input->post('bobot', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'datetime' => date('Y-m-d H:i:s'),            
        );
        $this->db->insert('bobot_saw', $data);
    }

    function update($id_bobot) {
        $data = array(
        'id_bobot' => $this->input->post('id_bobot',TRUE),
       'bobot' => $this->input->post('bobot', TRUE),
       'keterangan' => $this->input->post('keterangan', TRUE),
        'datetime' => date('Y-m-d H:i:s'),        
        );
        $this->db->where('id_bobot', $id_bobot);
        $this->db->update('bobot_saw', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_bobot) {
        $this->db->where('id_bobot', $id_bobot);
        $this->db->delete('bobot_saw'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_bobot, '.$value.' from bobot_saw order by id_bobot asc');
        $result[0]="-- Pilih Urutan id_bobot --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_bobot]= $row->$value;
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
