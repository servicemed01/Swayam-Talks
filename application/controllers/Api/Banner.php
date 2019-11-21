<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Banner extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    
    }

/* For Insert */

    public function AddBanner_post()
    {
        $status=array();
        $post=$this->post();
         $post['adminId']=$this->session->userdata('adminId');
        $image_path=$this->ImageUpload("bannerPhoto","Image","/assets/images/banner/");
            if($image_path)
            {
              $post["bannerPhoto"]=$image_path;
        $Add=$this->BannerModel->Banner_Insert($post);        
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

    public function DeleteBanner_delete($id)
    {
        $Delete = $this->BannerModel->Banner_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }
      
/* For Display */ 

    public function SelectBanner_get()
    {
        $Select = $this->BannerModel->Banner_Select();
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