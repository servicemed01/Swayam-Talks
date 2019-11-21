<?php 

/**
* 
*/
class ContactModel extends CI_Model
{

/* For Insert */

  public function Contact_Insert($data)
  {
  return $this->db->insert('contact',$data);  
  }

 /* For Delete */ 

  public function Contact_Delete($id)
  {
    return $this->db->delete('contact',['contactId'=>$id]);
  }

/* For Display */

  public function Contact_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('contact')
                    ->order_by('`contactId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
