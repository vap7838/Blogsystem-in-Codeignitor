<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class courseedit_controller extends CI_Controller 
{
    public function course_edit(){
        
        $user_id = $this->input->get('user_id');
        if($user_id){
            // $newdata = array(
            //     'id'  => $id,
            // );
           
            $this->session->set_userdata('user_id',$user_id);
        }
        $course_edit = $this->course_model->edit($user_id);
        //  echo"<pre>";  print_r($course_edit);exit;
            $course_selected = [];
        foreach($course_edit as $key => $value){
        
            if(array_key_exists($value['user_id'],$course_selected))
            {
                $course_selected[$value['user_id']]['course_id'][$value['id']] = $value['course_id'] ;
            }else
            {
                $course_selected[$value['user_id']] = [
                    'fname' => $value['fname'],
                    'lname' => $value['lname'],
                    'user_id' => $value['user_id'],
                ];
                $course_selected[$value['user_id']]['course_id'][] =  $value['course_id'];
                    
            }

        }
        
        $data = [];
        // $name = $this->user_model->show();
        $course = $this->course_model->select_course();

        $data = [
            'course' => $course,
            'course_edit' => $course_selected
        ];
        // echo"<pre>";  print_r($data);exit;
        $this->load->view('pages/header'); 
        $this->load->view('pages/course_asignedit', ['data'=>$data]);
       
    }

    public function edit_process()
    {   
        $username_id = $this->input->post('user_id');
        $course= $this->input->post('course');
        // $data =  array(
        //     'user_id' => $user_id,
        //     'course_id'=>$course ,
        // );
        // echo "<pre>"; print_r($data); exit;
        $user_id =  $this->session->userdata('user_id');
        $course_edit = $this->course_model->editprocess($username_id, $course,$user_id); 
        // echo "<pre>"; print_r($course_edit); exit;
        if($course_edit)
        {
            echo json_encode(TRUE);
        }else
        {
            echo json_encode(FALSE);
        }
    }
}