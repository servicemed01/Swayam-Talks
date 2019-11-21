<?php 

/**
* 
*/
class EventModel extends CI_Model
{

/* For Insert */

  public function Event_Insert($data)
  {
  return $this->db->insert('events',$data);  
  }

/* For Update */

  public function Event_Update($id,$data)
  {
     return $this->db->where('eventId',$id)
                     ->update('events',$data);
  }

/* For Delete */

  public function Event_Delete($id)
  {
    return $this->db->delete('events',['eventId'=>$id]);
  }

/* For Display */

  public function Event_Select($id=null)
  {
    if($id!=null)
    {
        $sel = $this->db->select('*')    
                        ->from('events')
                        ->where('eventId',$id)
                        ->join('location', '`location`.`locationId` = `events`.`locationId`')
                        ->order_by('`eventId`','DESC')
                        ->get();
             return $sel->result();
    }
    else{
        $sel = $this->db->select('*')    
                        ->from('events')
                        ->join('location', '`location`.`locationId` = `events`.`locationId`')
                        ->order_by('`events`.`eventDate` DESC')
                        ->get();
             return $sel->result(); 
    }
  }

  public function Get_SpeakerName($id)
  {
    $sel = $this->db->select('name')    
                    ->from('speaker')
                    ->where('speakerId',$id)
                    ->get();
    foreach ( $sel->result() as $row) {
       return $row->name;
      }  
  }

  public function Get_SponserName($id)
  {
    $sponser = $this->db->select('sponserName')    
                        ->from('sponser')
                        ->where('sponserId',$id)
                        ->get();
    foreach ($sponser->result() as $row) {
       return $row->sponserName;
      }  
  }


}
?>
