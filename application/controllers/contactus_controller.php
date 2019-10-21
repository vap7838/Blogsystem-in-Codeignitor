<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contactus_controller extends CI_Controller 
{
    public function contact_form()
    {   
        $this->load->view('pages/header');
        $this->load->view('pages/contactus');
    }

    public function sendmail()
    {  
        $from =  $this->input->post('from');
        $to =$this->config->item('smtp_user');
        $subject = $this->input->post('subject');
        $massage = $this->input->post('massage');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message("massage:".$massage);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}