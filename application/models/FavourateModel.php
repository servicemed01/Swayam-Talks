<?php 

/**
* 
*/
class FavourateModel extends CI_Model
{

/* For Insert */

  public function Favourate_Insert($data)
  {
  return $this->db->insert('`myfavourate`',$data);  
  }

 /* For Delete */ 

  public function Favourate_Delete($id)
  {
    return $this->db->delete('`myfavourate`',['favourateId'=>$id]);
  }

/* For Display */

  public function Favourate_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('`myfavourate`')
                    ->join('`user`','`user`.`userId`=`myfavourate`.`userId`')
                    ->join('`videos`','`videos`.`videos`.`videoId`=`myfavourate`.`videoId`')
                    ->order_by('`myfavourate`.`favourateId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
