<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Impact extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    }


/* For Insert */

    public function AddImpact_post()
    {
        $status=array();
        $post=$this->post();      
        $image_path=$this->ImageUpload("image","Image","/assets/images/impact/");
        $video_path=$this->VideoUpload("impactVideo","Video","/assets/images/impact/");
        $post["image"]=$image_path;
        $post["impactVideo"]=$video_path;
        $Add=$this->ImpactModel->Impact_Insert($post);        
         if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
          }
        // $upload_error=$this->upload->display_errors();
        $this->response($status, REST_Controller::HTTP_OK);
    }
 

/* For Update */
    
    public function UpdateImpact_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $video = $this->post('impactVideo');
         if(strpos($video, 'http') !== false)
         {
            $data["impactVideo"]=$video;
         }
         else{
         $video_path=$this->VideoUpload("impactVideo","Video","/assets/images/impact/");
         $data["impactVideo"]=$video_path;
         }
           $photo = $this->post('image');
         if(strpos($photo, 'http') !== false)
         {
            $data["image"]=$photo;
         }
         else{
          $image_path=$this->ImageUpload("image","Image","/assets/images/impact/");
          if($image_path)
            {
              $data["image"]=$image_path;
            }
            else{
              $status["error"]="failed to upload image";
            }
         }
         $Update = $this->ImpactModel->Impact_Update($id,$data);
         if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */

    public function DeleteImpact_delete($id)
    {
        $Delete = $this->ImpactModel->Impact_Delete($id);
        if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectImpact_get($id=null)
    {
        if($id!=null)
        $Select = $this->ImpactModel->Impact_Select($id);
    else
        $Select = $this->ImpactModel->Impact_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
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
 /* For Video Upload */

  public  function VideoUpload($video,$name,$path){
      $config1=[
'upload_path' => ".".$path,
'allowed_types' => 'mp4|OGG|WMV|3GP',
'max_size' => '10240',
'remove_spaces' => 'TRUE',
];
$this->load->library('upload',$config1); 
$data=$this->upload->initialize($config1);
if($this->upload->do_upload($video)){
$data=$this->upload->data();
$Video_path=base_url($path.$data['raw_name'].$data['file_ext']);
}
else{
  $Video_path=false;
}
return $Video_path;
    }
        
}
?>