<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('users', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'ip_address' => $this->input->post('ip_address', TRUE),
           
            'username' => $this->input->post('username', TRUE),
           
            'password' => $this->input->post('password', TRUE),
           
            'salt' => $this->input->post('salt', TRUE),
           
            'email' => $this->input->post('email', TRUE),
           
            'activation_code' => $this->input->post('activation_code', TRUE),
           
            'forgotten_password_code' => $this->input->post('forgotten_password_code', TRUE),
           
            'forgotten_password_time' => $this->input->post('forgotten_password_time', TRUE),
           
            'remember_code' => $this->input->post('remember_code', TRUE),
           
            'created_on' => $this->input->post('created_on', TRUE),
           
            'last_login' => $this->input->post('last_login', TRUE),
           
            'active' => $this->input->post('active', TRUE),
           
            'first_name' => $this->input->post('first_name', TRUE),
           
            'last_name' => $this->input->post('last_name', TRUE),
           
            'company' => $this->input->post('company', TRUE),
           
            'phone' => $this->input->post('phone', TRUE),
           
        );
        $this->db->insert('users', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'ip_address' => $this->input->post('ip_address', TRUE),
       
       'username' => $this->input->post('username', TRUE),
       
       'password' => $this->input->post('password', TRUE),
       
       'salt' => $this->input->post('salt', TRUE),
       
       'email' => $this->input->post('email', TRUE),
       
       'activation_code' => $this->input->post('activation_code', TRUE),
       
       'forgotten_password_code' => $this->input->post('forgotten_password_code', TRUE),
       
       'forgotten_password_time' => $this->input->post('forgotten_password_time', TRUE),
       
       'remember_code' => $this->input->post('remember_code', TRUE),
       
       'created_on' => $this->input->post('created_on', TRUE),
       
       'last_login' => $this->input->post('last_login', TRUE),
       
       'active' => $this->input->post('active', TRUE),
       
       'first_name' => $this->input->post('first_name', TRUE),
       
       'last_name' => $this->input->post('last_name', TRUE),
       
       'company' => $this->input->post('company', TRUE),
       
       'phone' => $this->input->post('phone', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from users order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
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
