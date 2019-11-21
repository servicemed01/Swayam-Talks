<?php 

/**
* 
*/
class BannerModel extends CI_Model
{

/* For Insert */

  public function Banner_Insert($data)
  {
  return $this->db->insert('banner',$data);  
  }

 /* For Delete */ 

  public function Banner_Delete($id)
  {
    return $this->db->delete('banner',['bannerId'=>$id]);
  }

/* For Display */

  public function Banner_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('banner')
                    //->select('`videos`.*')
                    //->join('videos', '`videos`.`videoId` = `banner`.`videoId`')
                    ->order_by('`bannerId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
