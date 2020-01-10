<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : API - Tian Anugerah Mulyana
 * @author   : ian Anugerah Mulyana <tiananugerah14@gmail.com>
 * @since    : 2019
 * @license  : https://www.gthub.com/tiananugerah
 */
class Login extends CI_Model {

    public function index($username ,$password)
    {
        $this->db->where('username' ,$username)->or_where('password' .$password);
        return $this->db->get('login');
        
    }

    public function create($data)
    {        
        this->db->insert('login' ,$data);   
    }

}