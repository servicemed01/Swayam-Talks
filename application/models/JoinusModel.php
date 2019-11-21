<?php 

/**
* 
*/
class JoinusModel extends CI_Model
{

/* For Insert Sponser */

  public function SponsersJoinus_Insert($data)
  {
  return $this->db->insert('joinsponser',$data);  
  }

  /* For Sponser Display */

  public function SponsersJoinus_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('joinsponser')
                    ->order_by('`spoId`','DESC')
                    ->get();
         return $sel->result();
  }

/* For Insert Organizer */

  public function OrganizerJoinus_Insert($data)
  {
  return $this->db->insert('joinorganizer',$data);  
  }

/* For Organizer Display */

  public function OrganizerJoinus_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('joinorganizer')
                    ->order_by('`orgId`','DESC')
                    ->get();
         return $sel->result();
  }

/* For Insert Audiance */

  public function AudianceJoinus_Insert($data)
  {
  return $this->db->insert('joinaudiance',$data);  
  }

  /* For Audiance Display */

  public function AudianceJoinus_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('joinaudiance')
                    ->order_by('`audId`','DESC')
                    ->get();
         return $sel->result();
  }

/* For Insert Speaker */

  public function SpeakerJoinus_Insert($data)
  {
  return $this->db->insert('joinspeaker',$data);  
  }

   /* For Speaker Display */

  public function SpeakerJoinus_Select()
  {
    $sel = $this->db->select('*')    
                    ->from('joinspeaker')
                    ->order_by('`speId`','DESC')
                    ->get();
         return $sel->result();
  }



  }
?>