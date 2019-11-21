<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Speaker extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    }


/* For Insert */

    public function AddSpeaker_post()
    {
        $status=array();
        $post=$this->post();
         $image_path=$this->ImageUpload("profile","Image","/assets/images/speaker/");
            if($image_path)
            {
              $post["profile"]=$image_path;
        $Add=$this->SpeakerModel->Speaker_Insert($post);        
         if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
          }
            }else{
              $status["error"]="failed to upload image";
            }
           // $upload_error=$this->upload->display_errors();
        $this->response($status, REST_Controller::HTTP_OK);
    }
 

/* For Update */
    
    public function UpdateSpeaker_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $photo = $this->post('profile');
         if(strpos($photo, 'http') !== false)
         {
            $data["profile"]=$photo;
         }
         else{
          $image_path=$this->ImageUpload("profile","Image","/assets/images/speaker/");
          if($image_path)
            {
              $data["profile"]=$image_path;
            }
            else{
              $status["error"]="failed to upload image";
            }
         }
         $Update = $this->SpeakerModel->Speaker_Update($id,$data);
         if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */

    public function DeleteSpeaker_delete($id)
    {
        $Delete = $this->SpeakerModel->Speaker_Delete($id);
        if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectSpeaker_get($id=null)
    {
    if($id!=null)
        $Select = $this->SpeakerModel->Speaker_Select($id);
    else
         $Select = $this->SpeakerModel->Speaker_Select();
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
        
}
?>