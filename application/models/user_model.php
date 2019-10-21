<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model
{
    public function insert($data){

   // insert user data 
   return $this->db->insert('registration',$data);


  }

  public function user_exit($uname)
  {
      $this->db->where('uname',$uname);
      $this->db->select('uname');
      $res=$this->db->get('registration');
      $row = $res->row();
      if(isset($row))
      {
        return true ;
      }
  //  $res=$this->db->get_where('registration', array('uname' => $uname));
  //   if($res->num_rows()==1){
  //     return $row->uname;
  //   }
 
  }

  public function email_exist($email)
  {
      $this->db->where('email',$email);
      $this->db->select('email');
      $res=$this->db->get('registration');
      $row = $res->row();
      if(isset($row))
      {
        return true ;
      }
  //  $res=$this->db->get_where('registration', array('uname' => $uname));
  //   if($res->num_rows()==1){
  //     return $row->uname;
  //   }
 
  }

  public function show()
  {
    $res = $this->db->get('registration');
    return $res->result_array();
  }

  public function login($uname,$password){
    $array = array('uname' => $uname, 'password' => $password);
    
    $res = $this->db->where($array);
    $res = $this->db->get('registration');

    if($res->num_rows()==1){
         return $res->row(0)->id;
      
    }
  }

}

