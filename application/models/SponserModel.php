<?php 

/**
* 
*/
class SponserModel extends CI_Model
{

/* For Insert */

  public function Sponser_Insert($data)
  {
  return $this->db->insert('sponser',$data);  
  }

 /* For Delete */ 

  public function Sponser_Delete($id)
  {
    return $this->db->delete('sponser',['sponserId'=>$id]);
  }

  /* For Update */

  public function Sponser_Update($id,$data)
  {
     return $this->db->where('sponserId',$id)
                     ->update('sponser',$data);
  }

/* For Display */

  public function Sponser_Select($id=null)
  {
    if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('sponser')
                    ->join('location','`location`.`locationId` = `sponser`.`locationId`')
                    ->where('sponserId', $id)
                    ->order_by('`sponserId`','DESC')
                    ->get();
         return $sel->result();
    }
    else{
       $sel = $this->db->select('*')    
                    ->from('sponser')
                    ->join('location','`location`.`locationId` = `sponser`.`locationId`')
                    ->order_by('`sponserId`','DESC')
                    ->get();
         return $sel->result();
    }
  }

/* Sponser Display by Location Id*/
  public function Sponser_Select_Id($id)
  {
    $sel = $this->db->select('*')    
                    ->from('sponser')
                    ->where('locationId',$id)
                    ->order_by('`sponserId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
