<?php 

/**
* 
*/
class LocationModel extends CI_Model
{

/* For Insert */

  public function Location_Insert($data)
  {
  return $this->db->insert('location',$data);  
  }

  /* For Update */

  public function Location_Update($id,$data)
  {
     return $this->db->where('locationId',$id)
                     ->update('location',$data);
  }

 /* For Delete */ 

  public function Location_Delete($id)
  {
    return $this->db->delete('location',['locationId'=>$id]);
  }

/* For Display */

  public function Location_Select($id=null)
  {
     if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('location')
                    ->where('locationId',$id)
                    ->order_by('`locationId`','DESC')
                    ->get();
           return $sel->result();
    }
    else{
      $sel = $this->db->select('*')    
                    ->from('location')
                    ->order_by('`locationId`','DESC')
                    ->get();
           return $sel->result();
    }

  }
}
?>
