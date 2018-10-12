<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Pimpinan_user_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('pimpinan_user', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_user_pimpinan) {
        $this->db->where('id_user_pimpinan', $id_user_pimpinan);
        $result = $this->db->get('pimpinan_user');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_pim_user($userid) {
        $this->db->where('userid', $userid);
        $result = $this->db->get('pimpinan_user');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'userid' => $this->input->post('userid', TRUE),
           
            'id_pimpinan' => $this->input->post('id_pimpinan', TRUE),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('pimpinan_user', $data);
    }

    function update($id_user_pimpinan) {
        $data = array(
        'id_user_pimpinan' => $this->input->post('id_user_pimpinan',TRUE),
       'userid' => $this->input->post('userid', TRUE),
       
       'id_pimpinan' => $this->input->post('id_pimpinan', TRUE),
       
       'datetime' =>date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id_user_pimpinan', $id_user_pimpinan);
        $this->db->update('pimpinan_user', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_user_pimpinan) {
        $this->db->where('id_user_pimpinan', $id_user_pimpinan);
        $this->db->delete('pimpinan_user'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_user_pimpinan, '.$value.' from pimpinan_user order by id_user_pimpinan asc');
        $result[0]="-- Pilih Urutan id_user_pimpinan --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_user_pimpinan]= $row->$value;
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
    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_user(){
        $result = array();
        $sql="SELECT
            a.id,
            a.username,
            a.email
            FROM
            users AS a
            LEFT outer JOIN pimpinan_user AS b ON b.userid = a.id
            where b.id_user_pimpinan is NULL ORDER BY `id` asc";
        $array_keys_values = $this->db->query($sql);
        $result[0]="-- Pilih User --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->username." | ".$row->email;
        }
        return $result;
    }
    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_pimpinan(){
        $result = array();
        $sql="SELECT
            a.id_pimpinan,
            a.kode,
            a.nama_pimpinan,
            pimpinan_user.id_user_pimpinan
            FROM
            pimpinan AS a
            LEFT JOIN pimpinan_user ON a.id_pimpinan = pimpinan_user.id_pimpinan
            where id_user_pimpinan is NULL ORDER BY id_pimpinan";
        $array_keys_values = $this->db->query($sql);
        $result[0]="-- Pilih Pimpinan --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_pimpinan]= $row->kode." | ".$row->nama_pimpinan;
        }
        return $result;
    }
    
}
?>
