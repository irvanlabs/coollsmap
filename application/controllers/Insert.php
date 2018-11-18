
<?php
defined('BASEPATH') or exit("No direct script access allowed");
/**
 *
 */
class Insert extends CI_Controller

    {
    function __construct()
        {
        parent::__construct()
            {
            $this->load->model('m_insert_data');
            $this->load->helper('url');
            $this->load->library('form_validation');
            }
        }

    // function inputData(){
    //      // DUMMY DATA
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

    function inputFotocopy()
        {

        // DUMMY DATA
        // proses validasi form

        $this->form_validation->set_rules('coordinate', 'Koordinat', 'required');
        $this->form_validation->set_rules('name', 'Nama Kost', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        // jika form tidak ada yang kosong jalankan perintah dibawah

        if ($this->form_validation->run() != false)
            {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $new_name = time() . $_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture'))
                {

                // jika upload foto error

                $error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($error);

                // $this->load->view('karyawan/dokter', $error);

                }
              else
                {

                // jika upload foto berhasil dilanjutkan proses form

                $koordinat = $this->input->post('coordinate');
                $nama = $this->input->post('name');
                // foto uploadz

                $data = array(
                    'upload_data' => $this->upload->data()
                );
                print_r($this->upload->data());
                $datafoto = $this->upload->data();
                $nm_file = $datafoto['orig_name'];

                //

                $alamat = $this->input->post('address');
                $kab = $this->input->post('kabupaten');
                $kec = $this->input->post('kecamatan');
                $data = array(
                    'id_fc' => '',
                    'coordinate' => $koordinat,
                    'name' => $nama,
                    'picture' => $nm_file,
                    'address' => $alamat,
                    'kabupaten' => $kab'kecamatan' => $kecamatan
                );
                $this->m_data->input_data($data, 'fotocopy');
                redirect('karyawan/tambahKaryawan'); //CHANGE
                }
            }
          else
            {
            $this->load->view('karyawan/header'); //CHANGE
            $this->load->view('karyawan/tambahKaryawan'); //CHANGE
            $this->load->view('karyawan/footer'); //CHANGE
            }
        }

        function inputPonpes()
        {

        // DUMMY DATA
        // proses validasi form

        $this->form_validation->set_rules('coordinate', 'Koordinat', 'required');
        $this->form_validation->set_rules('name', 'Nama Kost', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Kost', 'required');
        $this->form_validation->set_rules('phone_number', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('facility', 'Fasilitas', 'required');
        $this->form_validation->set_rules('daily_activities', 'Kegiatan Sehari-hari', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        // jika form tidak ada yang kosong jalankan perintah dibawah

        if ($this->form_validation->run() != false)
            {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $new_name = time() . $_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture'))
                {

                // jika upload foto error

                $error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($error);

                }
              else
                {

                // jika upload foto berhasil dilanjutkan proses form

                $koordinat = $this->input->post('coordinate');
                $nama = $this->input->post('name');
                $description = $this->input->post('description');
                $phone = $this->input->post('phone_number');

                // foto uploadz

                $data = array(
                    'upload_data' => $this->upload->data()
                );
                print_r($this->upload->data());
                $datafoto = $this->upload->data();
                $nm_file = $datafoto['orig_name'];

                //

                $facility = $this->input->post('facility');
                $daily_activities = $this->input->post('daily_activities');
                $alamat = $this->input->post('address');
                $kab = $this->input->post('kabupaten');
                $kec = $this->input->post('kecamatan');
                $data = array(
                    'id_ps' => '',
                    'coordinate' => $koordinat,
                    'name' => $nama,
                    'description' => $description,
                    'phone_number' => $phone,
                    'picture' => $nm_file,
                    'facility' => $facility,
                    'daily_activities' => $daily_activities,
                    'address' => $alamat,
                    'kabupaten' => $kab,
                    'kecamatan' => $kecamatan
                );
                $this->m_data->input_data($data, 'pesantren');
                redirect('karyawan/tambahKaryawan'); //CHANGE
                }
            }
          else
            {
            $this->load->view('karyawan/header'); //CHANGE
            $this->load->view('karyawan/tambahKaryawan'); //CHANGE
            $this->load->view('karyawan/footer'); //CHANGE
            }
        }
        //Input kost
        function inputKost()
        {

        // proses validasi form

        $this->form_validation->set_rules('coordinate', 'Koordinat', 'required');
        $this->form_validation->set_rules('name', 'Nama Kost', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Kost', 'required');
        $this->form_validation->set_rules('rates', 'Harga per bulan', 'required');
        $this->form_validation->set_rules('rooms_facility', 'Fasilitas', 'required');
        $this->form_validation->set_rules('total_rooms', 'Jumlah Kamar', 'required');
        $this->form_validation->set_rules('type', 'Tipe Kos', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        // jika form tidak ada yang kosong jalankan perintah dibawah

        if ($this->form_validation->run() != false)
            {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $new_name = time() . $_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture'))
                {

                // jika upload foto error

                $error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($error);

                // $this->load->view('karyawan/dokter', $error);

                }
              else
                {

                // jika upload foto berhasil dilanjutkan proses form

                $koordinat = $this->input->post('coordinate');
                $nama = $this->input->post('name');
                $description = $this->input->post('description');

                // foto uploadz

                $data = array(
                    'upload_data' => $this->upload->data()
                );
                print_r($this->upload->data());
                $datafoto = $this->upload->data();
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
                    'picture' => $nm_file,
                    'rates' => $harga,
                    'rooms_facility' => $rooms_facility,
                    'total_rooms' => $total_rooms,
                    'type' => $tipe,
                    'address' => $alamat,
                    'kabupaten' => $kab,
                    'kecamatan' => $kecamatan
                );
                $this->m_data->input_data($data, 'indekos');
                redirect('karyawan/tambahKaryawan'); //CHANGE
                }
            }
          else
            {
            $this->load->view('karyawan/header'); //CHANGE
            $this->load->view('karyawan/tambahKaryawan'); //CHANGE
            $this->load->view('karyawan/footer'); //CHANGE
            }
        }


        //input

        function inputWarnet()
        {

        // proses validasi form

        $this->form_validation->set_rules('coordinate', 'Koordinat', 'required');
        $this->form_validation->set_rules('name', 'Nama Kost', 'required');
        $this->form_validation->set_rules('facility', 'Fasilitas', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        // jika form tidak ada yang kosong jalankan perintah dibawah

        if ($this->form_validation->run() != false)
            {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $new_name = time() . $_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture'))
                {

                // jika upload foto error

                $error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($error);

                // $this->load->view('karyawan/dokter', $error);

                }
              else
                {

                // jika upload foto berhasil dilanjutkan proses form

                $koordinat = $this->input->post('coordinate');
                $nama = $this->input->post('name');
                $facility = $this->input->post('facility');

                // foto uploadz

                $data = array(
                    'upload_data' => $this->upload->data()
                );
                print_r($this->upload->data());
                $datafoto = $this->upload->data();
                $nm_file = $datafoto['orig_name'];

                //

                $alamat = $this->input->post('address');
                $kab = $this->input->post('kabupaten');
                $kec = $this->input->post('kecamatan');
                $data = array(
                    'id_wnt' => '',
                    'coordinate' => $koordinat,
                    'name' => $nama,
                    'facility' => $description,
                    'picture' => $nm_file,
                    'address' => $alamat,
                    'kabupaten' => $kab,
                    'kecamatan' => $kecamatan
                );
                $this->m_data->input_data($data, 'warnet');
                redirect('karyawan/tambahKaryawan'); //CHANGE
                }
            }
          else
            {
            $this->load->view('karyawan/header'); //CHANGE
            $this->load->view('karyawan/tambahKaryawan'); //CHANGE
            $this->load->view('karyawan/footer'); //CHANGE
            }
        }

        function inputWarung()
        {

        // proses validasi form

        $this->form_validation->set_rules('coordinate', 'Koordinat', 'required');
        $this->form_validation->set_rules('name', 'Nama Kost', 'required');
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        // jika form tidak ada yang kosong jalankan perintah dibawah

        if ($this->form_validation->run() != false)
            {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $new_name = time() . $_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture'))
                {

                // jika upload foto error

                $error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($error);

                // $this->load->view('karyawan/dokter', $error);

                }
              else
                {

                // jika upload foto berhasil dilanjutkan proses form

                $koordinat = $this->input->post('coordinate');
                $nama = $this->input->post('name');

                // foto uploadz

                $data = array(
                    'upload_data' => $this->upload->data()
                );
                print_r($this->upload->data());
                $datafoto = $this->upload->data();
                $nm_file = $datafoto['orig_name'];

                //

                $tipe = $this->input->post('menu');
                $alamat = $this->input->post('address');
                $kab = $this->input->post('kabupaten');
                $kec = $this->input->post('kecamatan');
                $data = array(
                    'id_wrg' => '',
                    'coordinate' => $koordinat,
                    'name' => $nama,
                    'picture' => $nm_file,
                    'menu' => $menu,
                    'address' => $alamat,
                    'kabupaten' => $kab,
                    'kecamatan' => $kecamatan
                );
                $this->m_data->input_data($data, 'warung');
                redirect('karyawan/tambahKaryawan'); //CHANGE
                }
            }
          else
            {
            $this->load->view('karyawan/header'); //CHANGE
            $this->load->view('karyawan/tambahKaryawan'); //CHANGE
            $this->load->view('karyawan/footer'); //CHANGE
            }
        }

        function inputWorship()
        {

        // proses validasi form

        $this->form_validation->set_rules('coordinate', 'Koordinat', 'required');
        $this->form_validation->set_rules('name', 'Nama Tempat', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

        // jika form tidak ada yang kosong jalankan perintah dibawah

        if ($this->form_validation->run() != false)
            {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $new_name = time() . $_FILES["picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture'))
                {

                // jika upload foto error

                $error = array(
                    'error' => $this->upload->display_errors()
                );
                print_r($error);

                // $this->load->view('karyawan/dokter', $error);

                }
              else
                {

                // jika upload foto berhasil dilanjutkan proses form

                $koordinat = $this->input->post('coordinate');
                $nama = $this->input->post('name');

                // foto uploadz

                $data = array(
                    'upload_data' => $this->upload->data()
                );
                print_r($this->upload->data());
                $datafoto = $this->upload->data();
                $nm_file = $datafoto['orig_name'];

                //

                $alamat = $this->input->post('address');
                $kab = $this->input->post('kabupaten');
                $kec = $this->input->post('kecamatan');
                $data = array(
                    'id_wrsp' => '',
                    'coordinate' => $koordinat,
                    'name' => $nama,
                    'picture' => $nm_file,
                    'address' => $alamat,
                    'kabupaten' => $kab,
                    'kecamatan' => $kecamatan
                );
                $this->m_data->input_data($data, 'worship_place');
                redirect('pages/coba'); //CHANGE
                }
            }
          else
            {
            //$this->load->view('karyawan/header'); //CHANGE
            $this->load->view('pages/coba'); //CHANGE
            //$this->load->view('karyawan/footer'); //CHANGE
            }
        }
    }
?>
