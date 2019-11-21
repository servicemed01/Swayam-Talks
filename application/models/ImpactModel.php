<?php 

/**
* 
*/
class ImpactModel extends CI_Model
{

/* For Insert */

  public function Impact_Insert($data)
  {
  return $this->db->insert('impact',$data);  
  }

/* For Update */

  public function Impact_Update($id,$data)
  {
     return $this->db->where('impactId',$id)
                     ->update('impact',$data);
  }

/* For Delete */

  public function Impact_Delete($id)
  {
    return $this->db->delete('impact',['impactId'=>$id]);
  }

/* For Select */

  public function Impact_Select($id=null)
  {
    if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('impact')
                    ->where('impactId',$id)
                    ->order_by('`impactId`','DESC')
                    ->get();
         return $sel->result();
       }
       else{
         $sel = $this->db->select('*')    
                    ->from('impact')
                    ->order_by('`impactId`','DESC')
                    ->get();
         return $sel->result();
       }
  }
}
?>
