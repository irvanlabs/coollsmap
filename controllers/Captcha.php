<?php
('BASEPATH') OR exit('No direct script allowed');
/**
 * 
 */
class Captcha extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//memuat captchai helper
		$this->load->helper('captcha');
	}

	public function index(){
		//jika captcha from submitted
		if ($this->input->post('submit')) {
			$inputCaptcha = $this->input->post('captcha');
			$sessCaptcha = $this->session->userdata('captchaCode');
			if ($inputCaptcha == $sessCaptcha) {
				echo "Code captcha cocok";
			}else {
				echo "Captcha code tidak cocok silahkan coba lagi";
			}
		}

		$config = array('img_path' => 'captcha_images/',
			'img_url' => base_url().'captcha_images/',
			'img_width' => '150',
			'img_height' => 50,
			'word_length' => 8,
			'font_size' => 16
		 );
		$captcha = create_captcha($config);
		//unset captcha sebelumnya dan memberikan captcha baru
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode',$captcha['word']);
		//kirim captcha ke viewwww
		$data['captchaImg'] = $captcha['image'];
		//load view
		$this->load->view('captcha/index', $data);
	}
	public function refresh(){
		$config = array('img_path' => 'captcha_images/',
			'img_url' => base_url().'captcha_images/',
			'img_width' => '150',
			'img_height' => 50,
			'word_length' => 8,
			'font_size' => 16
		 );
		$captcha = create_captcha($config);
		//unset captcha sebelumnya dan memberikan captcha baru
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode',$captcha['word']);
		echo $captcha['image'];
	}
}
?>