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
function dataKost(){
        $this->load->database();
        $jumlah_data = $this->m_insert_data->count_data('indekos');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/karyawan/dataKaryawan/';//CHANGE
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 4;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['karyawan']/*CHANGE*/ = $this->m_insert_data->show_data('indekos',$config['per_page'],$from);
        $this->load->view('karyawan/header');//CHANGE
        $this->load->view('karyawan/data_karyawan', $data);//CHANGE
        $this->load->view('karyawan/footer');//CHANGE
    }