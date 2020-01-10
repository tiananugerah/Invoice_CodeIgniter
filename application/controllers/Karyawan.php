<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//get data dari model
        $data = $this->CRUD->get('karyawan');
	}
	
	public function insert()
	{
        $nama_depan     = $this->input->post('nama_depan');
        $nama_belakang  = $this->input->post('nama_belakang');
        $tlp            = $this->input->post('tlp');
        $email          = $this->input->post('email');

            $value=array(
                'nama_depan'        => $nama_depan,
                'nama_belakang'     => $nama_belakang,
                'tlp'               => $tlp,
                'email'             => $email
                );  

        $data = $this->CRUD->insert('karyawan', $value); 
    }

    public function vUpdate()
    {
        $id_karyawan = $this->input->get('id');
        $hasil = $this->CRUD->get_byid('karyawan', 'id_karyawan', $id_karyawan)->row();;
        $data = array(
            'id_karyawan'       => $id_karyawan,
            'nama_depan'        => $nama_depan,
            'nama_belakang'     => $nama_belakang,
            'tlp'               => $tlp,
            'email'             => $email
        );    
    }

    public function update()
    {
        $id_karyawan    = $this->input->post('id_karyawan');
        $nama_depan     = $this->input->post('nama_depan');
        $nama_belakang  = $this->input->post('nama_belakang');
        $tlp            = $this->input->post('tlp');
        $email          = $this->input->post('email');;


        $value=array(
            'id_karyawan'       => $id_karyawan,
            'nama_depan'        => $nama_depan,
            'nama_belakang'     => $nama_belakang,
            'tlp'               => $tlp,
            'email'             => $email
            );  

        $data = $this->CRUD->update($value, 'karyawan', 'id_karyawan' ,$id_karyawan);    
    }

    public function delete()
    {
        $id_karyawan = $this->input->post('id_karyawan');

        $hapus_data = $this->CRUD->delete('karyawan', 'id_karyawan', $id_karyawan);
    }

}
