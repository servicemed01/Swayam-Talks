<?php 

/**
* 
*/
class FaqModel extends CI_Model
{

/* For Insert */

  public function Faq_Insert($data)
  {
  return $this->db->insert('faq',$data);  
  }

 /* For Delete */ 

  public function Faq_Delete($id)
  {
    return $this->db->delete('faq',['faqId'=>$id]);
  }

/* For Display */

  public function Faq_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('faq')
                    ->order_by('`faqId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
