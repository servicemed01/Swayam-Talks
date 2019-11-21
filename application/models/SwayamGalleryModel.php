<?php 

/**
* 
*/
class SwayamGalleryModel extends CI_Model
{

/* For Insert */

  public function SwayamGallery_Insert($images)
   {
   return  $this->db->insert('galleryimage',$images); 
   } 


  /* For Delete SwayamGallery Images */ 

  public function SwayamGalleryImages_Delete($id)
  {
     return  $this->db->delete('`galleryimage`',['galleryImageId'=>$id]);
  }

/* For Display */

  public function SwayamGallery_Select()
  {
  $sel = $this->db->select('*')    
                  ->from('`galleryimage`')
                  ->order_by('`galleryImageId`','DESC')
                  ->get();
         return $sel->result();
        

  }

//   public function SwayamGallery_Select($Type=null)
//   {
//      if($Type!=null)
//     {
//     $gallery=array();
//     $count=0;
//     $title= $this->db->select('*')
//                     ->from('gallerytitle')
//                     ->where('galleryType',$Type)
//                     ->get();
//          //return  $title->result();
//          foreach ($title->result() as $row) 
//     {
//       $images=array();
//       array_push($gallery,$row);
              
//             $image = $this->db->select('*')
//                          ->from('galleryimage')
//                          ->where('`galleryTitleId`',$row->galleryTitleId)
//                          ->get();
//         foreach ($image->result() as $rows) 
//         {
//            array_push($images,$rows);
//            $gallery[$count]->galleryimage=$images;
//         }
//         // $gallery['galleryimage']=$images;
//        $count++; 
//     }
//     return $gallery;
//   }
//   else{
//     $gallery=array();
//     $count=0;
//     $title= $this->db->select('*')
//                     ->from('gallerytitle')
//                     ->get();
//          //return  $title->result();
//          foreach ($title->result() as $row) 
//     {
//       $images=array();
//       array_push($gallery,$row);
              
//             $image = $this->db->select('*')
//                          ->from('galleryimage')
//                          ->where('`galleryTitleId`',$row->galleryTitleId)
//                          ->get();
//         foreach ($image->result() as $rows) 
//         {
//            array_push($images,$rows);
//            $gallery[$count]->galleryimage=$images;
//         }
//         // $gallery['galleryimage']=$images;
//        $count++; 
//     }
//     return $gallery;
//   }
// }
}
?>
