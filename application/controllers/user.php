<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	
	public function registration()
	{
        $this->load->view('pages/header');
        $this->load->view('pages/registration');
    }

    public function user_exist(){
        $uname   = $this->input->post('uname');
        $res=$this->user_model->user_exit($uname);
        echo json_encode($res);
        
    }

    public function email_exist(){
        $email   = $this->input->post('email');
        $res=$this->user_model->email_exist($email);
        echo json_encode($res);
   
    }

    public function insert()
    {   
   
            $data =  array(
                'fname' => $this->input->post('fname'),
                'lname'    => $this->input->post('lname'),
                'uname'    => $this->input->post('uname'),
                'qualification'    => $this->input->post('qualification'),
                'gender'    => $this->input->post('gender'),
                'email'    => $this->input->post('email'),
                'password'    =>$this->input->post('password')
            );
    
    
            $res=$this->user_model->insert($data);
            echo json_encode($res);
    }
    
}