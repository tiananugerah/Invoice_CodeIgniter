<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : API - Tian Anugerah Mulyana
 * @author   : ian Anugerah Mulyana <tiananugerah14@gmail.com>
 * @since    : 2019
 * @license  : https://www.gthub.com/tiananugerah
 */
class Crud extends CI_Model {


    /*Tampils*/

    public function get($table){

        $query = $this->db->get($table);
        return $query->result();
    }

    /*Tampil by id*/

    public function get_byid($table, $where, $data){

        $this->db->where($where, $data);
        return $this->db->get($table);
    }

    /*Simpan*/

    public function insert($table, $data){

        return $this->db->insert($table, $data);

    }

    /*Update*/

    public function Update($data,$table,$where,$value){
        $this->db->where($where,$value);
        return $this->db->update($table,$data);        
    }
    
    /*delete*/
        
    public function delete($table, $where, $data){

        $this->db->where($where, $data);
        return $this->db->delete($table);
    }

    /*Login*/

    public function cek($username, $password){

        $this->db->where('username',$username)->or_where('email',$username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }


}