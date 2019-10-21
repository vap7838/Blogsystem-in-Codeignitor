<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class coursedisplay_controller extends CI_Controller 
{
    public function display()
	{   
        $course['course']=$this->course_model->select();
      
        $course_teacher = [];
        foreach($course['course'] as $key => $value){
        
            if(array_key_exists($value['user_id'],$course_teacher))
            {
                $course_teacher[$value['user_id']]['course'][$value['id']] = $value['course_name'] ;
            }else
            {
            
                    $course_teacher[$value['user_id']] = [
                    'user_id' => $value['user_id'], 
                    'name' => $value['fname']."".$value['lname'],
                    'course' => [
                        $value['id'] => $value['course_name']  
                    ]
                    ];
                    
            
            
            }

        }
    //  echo '<pre>'; print_r($course_teacher);exit;
        $this->load->view('pages/header');
        $this->load->view('pages/display_course_asign',['course_teacher'=>$course_teacher]);
    }
}