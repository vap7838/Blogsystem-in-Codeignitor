<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {
    
    public function login()
	{

        $this->load->view('pages/header');
        $this->load->view('pages/login');
    }

    public function loginprocess()
    {
        $uname = $this->input->post('uname');
        $password = $this->input->post('password');

        $id=$this->user_model->login($uname,$password);
        if($id){

                $newdata = array(
                    'id'  => $id,
                    'uname'     => $uname,
                    'logged_in' => TRUE
                );
               
            $this->session->set_userdata($newdata);  
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }

    public function destroy(){
        session_destroy();
        redirect('login_controller/login');
    }

    
}