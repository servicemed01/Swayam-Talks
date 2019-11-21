<?php 

/**
* 
*/
class VideoModel extends CI_Model
{

/* For Insert */

  public function Video_Insert($data)
  {
  return $this->db->insert('videos',$data);  
  }

/* For Update */

  public function Video_Update($id,$data)
  {
     return $this->db->where('videoId',$id)
                     ->update('videos',$data);
  }

/* For Delete */

  public function Video_Delete($id)
  {
    return $this->db->delete('videos',['videoId'=>$id]);
  }

/* For Display */

  public function Video_Select($id=null)
  {
     if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('videos')
                    ->select('`speaker`.*')
                    ->join('`speaker`', '`speaker`.`speakerId` = `videos`.`speakerId`')
                    ->select('`category`.*')
                    ->join('category', '`category`.`categoryId` = `videos`.`categoryId`')
                    ->select('`location`.*')
                    ->join('location', '`location`.`locationId` = `videos`.`locationId`')
                    // ->select('`events`.*')
                    // ->join('events', '`events`.`eventId` = `videos`.`eventId`')
                    ->where('videoId', $id)
                    ->order_by('`videos`.`videoId`','DESC')
                    ->get();
         return $sel->result();
          }
    else{
      $sel = $this->db->select('*')    
                    ->from('videos')
                    ->select('`speaker`.*')
                    ->join('`speaker`', '`speaker`.`speakerId` = `videos`.`speakerId`')
                    ->select('`category`.*')
                    ->join('category', '`category`.`categoryId` = `videos`.`categoryId`')
                    ->select('`location`.*')
                    ->join('location', '`location`.`locationId` = `videos`.`locationId`')
                    // ->select('`events`.*')
                    // ->join('events', '`events`.`eventId` = `videos`.`eventId`')
                    ->order_by('`videos`.`videoId`','DESC')
                    ->get();
         return $sel->result();
    }
  }

/* For Most Visited */

   public function Most_Visited()
   {
     $cat = $this->db->select('category.categoryName , sum(videoviews) as views')
                    ->from('videos')
                    ->join('category','category.categoryId=videos.categoryId')
                    ->group_by('videos.categoryId')
                    ->order_by('videoviews','DESC')
                    ->get();
                return $cat->result();
   } 

/* Trending Videos*/

    public function Trending_Videos()
    {
      $tend = $this->db->select('*')
                        ->from('videos')
                        ->order_by('videoviews','DESC')
                        ->get();
                  return $tend->result();



    }

/* Display Videos Of Swayam Stories */

  public function Stories_Videos()
  {
     $sel = $this->db->select('*')    
                     ->from('videos')
                     ->select('`speaker`.*')
                     ->join('`speaker`', '`speaker`.`speakerId` = `videos`.`speakerId`')
                     ->select('`category`.*')
                     ->join('category', '`category`.`categoryId` = `videos`.`categoryId`')
                     ->select('`location`.*')
                     ->join('location', '`location`.`locationId` = `videos`.`locationId`')
                     // ->select('`events`.*')
                     // ->join('events', '`events`.`eventId` = `videos`.`eventId`')
                     ->where('videoType','Swayam Stories')
                     ->order_by('`videos`.`videoId`','DESC')
                     ->get();
                return $sel->result();
              
  }

/* Display Videos Of Swayam Talks */

  public function Talks_Videos()
  {
     $sel = $this->db->select('*')    
                    ->from('videos')
                    ->select('`speaker`.*')
                    ->join('`speaker`', '`speaker`.`speakerId` = `videos`.`speakerId`')
                    ->select('`category`.*')
                    ->join('category', '`category`.`categoryId` = `videos`.`categoryId`')
                    ->select('`location`.*')
                    ->join('location', '`location`.`locationId` = `videos`.`locationId`')             
                    // ->select('`events`.*')
                    // ->join('events', '`events`.`eventId` = `videos`.`eventId`')
                     ->where('videoType','Swayam Talks')
                    ->order_by('`videos`.`videoId`','DESC')
                    ->get();
         return $sel->result();
  }


}
?>
