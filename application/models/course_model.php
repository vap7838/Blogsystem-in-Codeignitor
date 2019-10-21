<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class course_model extends CI_Model
{
    public function select_course()
    {
        $res = $this->db->get('courses');
        return $res->result_array();
    }

    public function insert($course,$user_id)
    {   
      
        foreach($course as $key => $value){
           $res= $this->db->insert('teachercourse',['user_id' =>$user_id ,'course_id' => $value]);
          }
          return $res;
    }

    public function select()
    {   

        // $this->db->select('teachercourse.id,courses.course_name,registration.fname,registration.lname');
        $this->db->from('teachercourse');
        $this->db->join('registration', 'registration.id = teachercourse.user_id','inner');
        $this->db->join('courses', 'courses.id = teachercourse.course_id');
        $this->db->select('teachercourse.id,teachercourse.user_id,courses.course_name,registration.fname,registration.lname');
        // $this->db->group_by("teachercourse.user_id");
        $query = $this->db->get();
    
       return  $query->result_array();
        // echo "<pre>"; print_r($res); exit;
    }

    public function edit($user_id)
    {  
        $this->db->SELECT ('*');
        $this->db->FROM ('registration');
        $this->db->JOIN ('teachercourse','teachercourse.user_id=registration.id','inner');
        $this->db->WHERE ('teachercourse.user_id',$user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_newdata_editprocess($username_id, $course,$user_id)
    {
        foreach($course as $key => $value){
            $this->db->where('user_id', $user_id);
            $this->db->set(['user_id' =>$user_id ,'course_id' => $value]);
            $insert=$this->db->insert('teachercourse');
        }
        return $insert;
    }
    public function editprocess($username_id, $course,$user_id)
    {
        $this->db->where('user_id', $user_id); 
        $this->db->delete('teachercourse');
        $update = $this->insert_newdata_editprocess($username_id, $course,$user_id);
        return $update;
    }

    public function delete($user_id)
    {
        return $this->db->delete('teachercourse', array('user_id' => $user_id)); 
    }


}