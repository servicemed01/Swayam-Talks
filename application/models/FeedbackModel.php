<?php 

/**
* 
*/
class FeedbackModel extends CI_Model
{

/* For Insert */

  public function Feedback_Insert($data)
  {
  return $this->db->insert('feedback',$data);  
  }

 /* For Delete */ 

  public function Feedback_Delete($id)
  {
    return $this->db->delete('feedback',['feedbackId'=>$id]);
  }

/* For Display */

  public function Feedback_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('feedback')
                    ->order_by('`feedbackId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
