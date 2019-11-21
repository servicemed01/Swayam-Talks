<?php 

/**
* 
*/
class LoginModel extends CI_Model
{

  public function Login($name,$password)  {  
  	
            $Login = $this->db->where(['name'=> $name,'password'=> $password])
                               ->from('admin')
                               ->get();
           return  $Login->row_array();

      
  } 


}
?>