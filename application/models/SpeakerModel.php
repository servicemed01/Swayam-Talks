<?php 

/**
* 
*/
class SpeakerModel extends CI_Model
{

/* For Insert */

  public function Speaker_Insert($data)
  {
  return $this->db->insert('speaker',$data);  
  }

/* For Update */

  public function Speaker_Update($id,$data)
  {
     return $this->db->where('speakerId',$id)
                     ->update('speaker',$data);
  }

/* For Delete */

  public function Speaker_Delete($id)
  {
    return $this->db->delete('speaker',['speakerId'=>$id]);
  }

/* For Select */

  public function Speaker_Select($id=null)
  {
    if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('speaker')                    
                    ->where('speakerId',$id)
                    ->order_by('`speakerId`','DESC')
                    ->get();
         return $sel->result();
          }
    else{
       $sel = $this->db->select('*')    
                    ->from('speaker')
                    ->order_by('`speakerId`','DESC')
                    ->get();
         return $sel->result();
    }
  }
}
?>
