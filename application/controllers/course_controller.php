<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class course_controller extends CI_Controller {

    public function course()
    {   
        $data = [];
        $name = $this->user_model->show();
        $course = $this->course_model->select_course();
        $data = [
            'name' => $name,
            'course' => $course
        ];
        $this->load->view('pages/header');
        $this->load->view('pages/course_asign',['data'=>$data]);
    }

    public function course_asign()
    {   
        
        $user_id = $this->input->post('user_id');
        $course =  $this->input->post('course');      
        // $data =  array(
        //     'user_id' => $this->input->post('user_id'),
        //     'course'=> $course,
        // );
       
        // print_r($data);
         $course_asign = $this->course_model->insert($course,$user_id); 

         print_r($course_asign);
       if($course_asign)
       {    
        echo json_encode(TRUE);
       }else
       {
        echo json_encode(FALSE);
       }
    }

}