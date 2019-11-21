<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Video extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    }

/* For Insert */

    public function AddVideo_post()
    {
        $status=array();
        $post=$this->post();
         $post['adminId']=$this->session->userdata('adminId');
        $image_path=$this->ImageUpload("photo","Image","/assets/images/videos/");
            if($image_path)
            {
              $post["photo"]=$image_path;
              $Add=$this->VideoModel->Video_Insert($post);              
               if($Add) {
         $status["status"]=true;
        }
        else{
         $status["status"]=false;
              }
            }else{
              $status["error"]="failed to upload image";
            }
         $this->response($status, REST_Controller::HTTP_OK);
    }

/* For Update */
     
    public function UpdateVideo_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $photo = $this->post('photo');
         if(strpos($photo, 'http') !== false)
         {
            $post["photo"]=$photo;
         }
         else{
          $image_path=$this->ImageUpload("photo","Image","/assets/images/videos/");
          if($image_path)
            {
              $post["photo"]=$image_path;
            }
            else{
              $status["error"]="failed to upload image";
            }
         }
         $Update = $this->VideoModel->Video_Update($id,$data);
        if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */

    public function DeleteVideo_delete($id)
    {
        $Delete = $this->VideoModel->Video_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Swayam Talks */

    public function SelectVideo_get($id=null)
    {
      if($id!=null)
        $Select = $this->VideoModel->Video_Select($id);
      else
        $Select = $this->VideoModel->Video_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }

/* For Most Visited */

    public function MostVisited_get()
    {
        $Visited = $this->VideoModel->Most_Visited();
        $this->response($Visited,REST_Controller::HTTP_OK);
    }

    /* For Swayam Stories */
public function StoriesVideo_get()
    {
        $SelectStories = $this->VideoModel->Stories_Videos();
        $this->response($SelectStories,REST_Controller::HTTP_OK);
    }

 /* For Swayam Talks */
public function TalksVideo_get()
    {
        $SelectStories = $this->VideoModel->Talks_Videos();
        $this->response($SelectStories,REST_Controller::HTTP_OK);
    }


/* For Add Views*/

  public function AddViews_post()
  {
       $status=array();
     $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
          $Update = $this->VideoModel->Video_Update($id,$data);
        if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
             $this->response($status, REST_Controller::HTTP_OK);
  }

/* For Image Upload */

  public  function ImageUpload($file,$name,$path){
      $config=[
'upload_path' => ".".$path,
'allowed_types' => 'gif|jpg|png|jpeg|JPG|JPEG|PNG',
'remove_spaces' => 'TRUE',
];
$this->load->library('upload',$config); 
if($this->upload->do_upload($file)){
$data=$this->upload->data();
$image_path=base_url($path.$data['raw_name'].$data['file_ext']);
}
else{
  $image_path=false;
}
return $image_path;
    }
        
}
?>