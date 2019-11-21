<?php 

/**
* 
*/
class DemoApiModel extends CI_Model
{

/* For Insert */

  public function Data_Insert($data)
  {
  return $this->db->insert('form',$data);  
  }

  public function Data_Update($id,$data)
  {
     return $this->db->where('id',$id)
                     ->update('form',$data);
  }
  public function Data_Delete($id)
  {
    return $this->db->delete('form',['id'=>$id]);
  }

  public function Data_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('form')
                    ->get();
         return $sel->result();
  }
}
?>
