<?php 

/**
* 
*/
class UserModel extends CI_Model
{

/* For User Login */

public function LoginUser($mobile,$password)  {  
    
            $Userdata = $this->db->where(['mobile'=> $mobile,'password'=> $password])
                               ->from('users')
                               ->get();
           return  $Userdata->row_array();

      
  } 


/* For Insert */

  public function User_Insert($data)
  {
  return $this->db->insert('users',$data);  
  }

/* For Upadte */

  public function User_Update($id,$data)
  {
     return $this->db->where('userId',$id)
                     ->update('users',$data);
  }

  /* For Delete */


  public function User_Delete($id)
  {
    return $this->db->delete('users',['userId'=>$id]);
  }

/* For Display */

  public function User_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('users')
                    ->order_by('`userId`','DESC')
                    ->get();
         return $sel->result();
  }


}
?>
