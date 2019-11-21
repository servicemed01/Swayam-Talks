<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Sponser extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       
    }

/* For Insert */

    public function AddSponser_post()
    {
        $status=array();
        $post=$this->post();
        $image_path=$this->ImageUpload("sponserImage","Image","/assets/images/sponser/");
            if($image_path)
            {
              $post["sponserImage"]=$image_path;   
        $Add=$this->SponserModel->Sponser_Insert($post);        
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


/* For Delete */
 
    public function DeleteSponser_delete($id)
    {
        $Delete = $this->SponserModel->Sponser_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }

/* For Update */
     
    public function UpdateSponser_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $photo = $this->post('sponserImage');
         if(strpos($photo, 'http') !== false)
         {
            $data["sponserImage"]=$photo;
         }
         else{
          $image_path=$this->ImageUpload("sponserImage","Image","/assets/images/Sponser/");
          if($image_path)
            {
              $data["sponserImage"]=$image_path;
            }
            else{
              $status["error"]="failed to upload image";
            }
         }
         $Update = $this->SponserModel->Sponser_Update($id,$data);
        if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }

/* For Display */

    public function SelectSponser_get($id=null)
    {
      if($id!=null)
      {
        $Select = $this->SponserModel->Sponser_Select($id);
        $this->response($Select,REST_Controller::HTTP_OK);
      }
      else{
        $Select = $this->SponserModel->Sponser_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
      }
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