<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gajih extends CI_Controller {

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
        $data = $this->CRUD->get('gajih');
	}
	
	public function insert()
	{
        $jenis_gajih    = $this->input->post('jenis_gajih');
        $gajih          = $this->input->post('gajih');
        $gajih_tambahan = $this->input->post('gajih_tambahan');
        $potongan       = $this->input->post('potongan');
        $lemburan       = $this->input->post('lemburan');

            $value=array(
                'jenis_gajih'       => $jenis_gajih,
                'gajih'             => $gajih,
                'gajih_tambahan'    => $gajih_tambahan,
                'potongan'          => $potongan,
                'lemburan'          => $lemburan
                );  

        $data = $this->CRUD->insert('gajih', $value);       
    }

    public function vUpdate()
    {
        $id = $this->input->get('id');
        $hasil = $this->CRUD->get_byid('gajih', 'id_gajih', $id)->row();;
        $data = array(
            'id_gajih'          => $id_gajih,
            'jenis_gajih'       => $jenis_gajih,
            'gajih'             => $gajih,
            'gajih_tambahan'    => $gajih_tambahan,
            'potongan'          => $potongan,
            'lemburan'          => $lemburan
        );    
    }

    public function update()
    {
        $id_gajih       = $this->input->post('id_gajih');
        $jenis_gajih    = $this->input->post('jenis_gajih');
        $gajih          = $this->input->post('gajih');
        $gajih_tambahan = $this->input->post('gajih_tambahan');
        $potongan       = $this->input->post('potongan');
        $lemburan       = $this->input->post('lemburan');


        $value=array(
            'id_gajih'          => $id_gajih,
            'jenis_gajih'       => $jenis_gajih,
            'gajih'             => $gajih,
            'gajih_tambahan'    => $gajih_tambahan,
            'potongan'          => $potongan,
            'lemburan'          => $lemburan
            );  

        $data = $this->CRUD->update($value, 'gajih', 'id_gajih' ,$id_gajih);
    
    }

    public function delete()
    {
        $id_gajih = $this->input->post('id');

        $hapus_data = $this->CRUD->delete('gajih', 'id_gajih', $id_gajih);

        echo json_encode($hapus_data);
    }

}
