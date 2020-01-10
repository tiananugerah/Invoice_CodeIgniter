<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kirim extends CI_Controller {

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
        $message = "Nsbh Yth, per @dd/@mm/@yy kami belum menerima pembayaran angsuran ke @angsuran Anda PK @kontrak. Mhn segera lakukan pembayaran. Abaikan SMS ini jk sudah bayar. Tks";

        //------- API Provider SME
        $url = "https://sms.smartme.co.id:43452/smsjson/?username=adminsmsolusi&password=S3lamatP4gi&sender=LONGNUMBER&msisdn=%s&message=%s";
        // $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=js4kir&passkey=F@t4yaku77&nohp=%s&pesan=%s";
        
        
	}
}
