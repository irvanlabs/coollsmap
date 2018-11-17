<?
class Pages extends CI_Controller {
    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

public function submit_register(){
            // validation form
            if (!$this->session->userdata('member_id')){
                $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');   
                $this->form_validation->set_rules('uname', 'Username', 'required');  
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
                $this->form_validation->set_rules('telp', 'Nomor telepon', 'required|numeric'); 
                $this->form_validation->set_rules('passwd', 'Password', 'required|min_length[5]|matches[retype_password]');   
                $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|min_length[5]|matches[password]');    

                if($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('failed', validation_errors('<div class="alert alert-danger">','</div>'));
                    redirect('member/register');             
                } else {


                    //proses register
                    $data_member = array(
                            'name' =>$this->input->post('name'),
                            'email' =>$this->input->post('email'),
                            'telp' =>$this->input->post('telp'),
                            'username' =>$this->input->post('uname'),
                            'passwd' => password_hash($this->input->post('passwd'), PASSWORD_DEFAULT)
                        );
                    $this->member_m->register($data_member);

                    //proses login
                    $member=$this->member_m->get_member_by_username($this->input->post('uname'));
                    $this->session->set_userdata(array(
                        'member_id' => $member->id,
                        'member_name' => $member->name,
                        'member_email' => $member->email,
                        'member_logged_in' => TRUE
                    ));
                }
            }

            redirect('contributor');
        }
}