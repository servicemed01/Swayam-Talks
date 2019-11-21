<?php 

/**
* 
*/
class HistoryModel extends CI_Model
{

/* For Insert */

  public function History_Insert($data)
  {
  return $this->db->insert('history',$data);  
  }

 /* For Delete */ 

  public function History_Delete($id)
  {
    return $this->db->delete('history',['historyId'=>$id]);
  }

/* For Display */

  public function History_Select()
  {
    $sel = $this->db->select('*')
                    ->group_by('history.videoId')    
                    ->from('history')
                    ->join('users','users.userId=history.userId')
                    ->join('videos','videos.videoId=history.videoId')
                    ->order_by('`historyId`','DESC')
                    ->get();
         return $sel->result();
  }
}
?>
