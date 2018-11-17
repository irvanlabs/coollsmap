<?php
defined('BASEPATH') or exit("No direct script access allowed");
/**
 * 
 */
class Insert extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(){
			$this->load->model('m_insert_data');
			$this->load->helper('url');
			$this->load->library('form_validation');
		}
	}

	// function inputData(){
 // 		// DUMMY DATA
 //        //proses validasi form
 //        $this->form_validation->set_rules('nama','Nama Karyawan','required');
 //        $this->form_validation->set_rules('alamat','Alamat Karyawan','required');
 //        $this->form_validation->set_rules('gender','Gender Karyawan','required');
 //        $this->form_validation->set_rules('gaji','Gaji Karyawan','required');
 
 //        //jika form tidak ada yang kosong jalankan perintah dibawah
 //        if($this->form_validation->run() != false){
 //            $config['upload_path'] = './gambar/';
 //            $config['allowed_types'] = 'gif|jpg|png';
 //            $config['max_size'] = '100000';
 //            $config['max_width']  = '10240';
 //            $config['max_height']  = '7680';
 //            $new_name = time().$_FILES["foto"]['name'];
 //            $config['file_name'] = $new_name;
 //            $this->load->library('upload', $config);
 
 //        if ( ! $this->upload->do_upload('foto'))
 //        {
 //            //jika upload foto error
 //            $error = array('error' => $this->upload->display_errors());
 //            print_r($error);
 //            // $this->load->view('karyawan/dokter', $error);
 //        }
 //        else
 //        {
 //            //jika upload foto berhasil dilanjutkan proses form
 //            $nama = $this->input->post('nama');
 //            $gender = $this->input->post('gender');
 //            $gaji = $this->input->post('gaji');
 //            $alamat = $this->input->post('alamat');
 //            $data = array('upload_data' => $this->upload->data());
 //            print_r($this->upload->data());
 //            $datafoto=$this->upload->data();
 //            $nm_file = $datafoto['orig_name'];
 //            $data = array(
 //                'nama' => $nama,
 //                'foto' => $nm_file,
 //                'gender' => $gender,
 //                'alamat' => $alamat,
 //                'gaji' => $gaji
 //                );
 //            $this->m_data->input_data($data,'karyawan');
 //            redirect('karyawan/tambahKaryawan');
 //        }
 //    } else{
 //        $this->load->view('karyawan/header');
 //        $this->load->view('karyawan/tambahKaryawan');
 //        $this->load->view('karyawan/footer');
 //    }

function inputKost(){
 		// DUMMY DATA
        //proses validasi form
		$this->form_validation->set_rules('coordinate','Koordinat','required');
        $this->form_validation->set_rules('name','Nama Kost','required');
        $this->form_validation->set_rules('description','Deskripsi Kost','required');
        $this->form_validation->set_rules('rates','Harga per bulan','required');
        $this->form_validation->set_rules('rooms_facility','Fasilitas','required');
        $this->form_validation->set_rules('total_rooms','Jumlah Kamar','required');
        $this->form_validation->set_rules('type','Tipe Kos','required');
        $this->form_validation->set_rules('address','Alamat','required');
        $this->form_validation->set_rules('kabupaten','Kabupaten','required'); 
        $this->form_validation->set_rules('kecamatan','Kecamatan','required'); 
        //jika form tidak ada yang kosong jalankan perintah dibawah
        if($this->form_validation->run() != false){
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width']  = '10240';
            $config['max_height']  = '7680';
            $new_name = time().$_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('picture'))
        {
            //jika upload foto error
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            // $this->load->view('karyawan/dokter', $error);
        }
        else
        {
            //jika upload foto berhasil dilanjutkan proses form
            $koordinat = $this->input->post('coordinate');
            $nama = $this->input->post('name');
            $description = $this->input->post('description');
            //foto uploadz
            $data = array('upload_data' => $this->upload->data());
            print_r($this->upload->data());
            $datafoto=$this->upload->data();
            $nm_file = $datafoto['orig_name'];
            //
            $harga = $this->input->post('rates');
            $rooms_facility = $this->input->post('rooms_facility');
            $total_rooms = $this->input->post('total_rooms');
            $tipe = $this->input->post('type');
            $alamat = $this->input->post('address');
            $kab = $this->input->post('kabupaten');
            $kec = $this->input->post('kecamatan');
            
            $data = array(
            	'id_kos' => '',
                'coordinate' => $koordinat,
                'name' => $nama,
                'description' => $description,
                'foto' => $nm_file,
                'rates' => $harga,
                'rooms_facility' => $rooms_facility,
                'total_rooms' => $total_rooms,
                'type' => $tipe,
                'address' => $alamat,
                'kabupaten' => $kab
                'kecamatan' => $kecamatan

                );
            $this->m_data->input_data($data,'indekos');
            redirect('karyawan/tambahKaryawan');
        }
    } else{
        $this->load->view('karyawan/header');
        $this->load->view('karyawan/tambahKaryawan');
        $this->load->view('karyawan/footer');
    }

}
}
?>