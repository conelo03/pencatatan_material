<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TesEmail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['title']	= 'Dashboard';
		$this->load->view('tesEmail', $data);
	}

	public function sendEmail()
    {
    	$data = $this->input->post('data');
    	$dataa = json_decode($data, true);

    	foreach ($dataa as $k) {
    		$email_penerima = $k['email'];
	    	$config = [
	            'mailtype'  => 'html',
	            'charset'   => 'utf-8',
	            'protocol'  => 'smtp',
	            'smtp_host' => 'smtp.googlemail.com',
	            'smtp_user' => 'uzisteven18@gmail.com',  // Email gmail
	            'smtp_pass'   => 'capricorn031999',  // Password gmail
	            'smtp_crypto' => 'ssl',
	            'smtp_port'   => 465,
	            'crlf'    => "\r\n",
	            'newline' => "\r\n"
	        ];

	        // Load library email dan konfigurasinya
	        $this->load->library('email', $config);

	        // Email dan nama pengirim
	        $this->email->from('no-reply@masrud.com', 'MasRud.com');

	        // Email penerima
	        $this->email->to($email_penerima); // Ganti dengan email tujuan

	        // Subject email
	        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

	        // Isi email
	        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/kirim-email-codeigniter/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

	        // Tampilkan pesan sukses atau error
	        if (!$this->email->send()) {
	            $res = [
		    		'res' => false
		    	];
		    	echo json_encode($res);
		    	die();
	        }
    	}

    	$res = [
    		'res' => true
    	];
    	echo json_encode($res);
      // Konfigurasi email
        
    }
}
