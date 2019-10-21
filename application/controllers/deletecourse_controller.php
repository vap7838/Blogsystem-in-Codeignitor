<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class deletecourse_controller extends CI_Controller 
{
    public function delete()
    {
        $user_id = $this->input->get('user_id');
      $res = $this->course_model->delete($user_id);
      if($res)
      {
        //   echo"<script>
        //   alert('delete successfully !');
        //   </script>";    
          redirect('coursedisplay_controller/display');
      }
    } 
}