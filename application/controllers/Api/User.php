<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class User extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    }

/* For User Login */

public function UserLogin_post()
    {
      $mobile=$this->input->post('mobile');
      $password=$this->input->post('password');
      $UserData=$this->UserModel->LoginUser($mobile,$password);
      if($UserData){
        $UserData['status']=true;
      }
      else{
        $UserData['status']=false;  
      }      
      $this->response($UserData, REST_Controller::HTTP_OK);
    }

/* For Insert */

    public function AddUser_post()
    {
        $status=array();
        $post=$this->post();
         $image_path=$this->ImageUpload("photo","Image","/assets/images/users/");
         $post["photo"]=$image_path;  
        $Add=$this->UserModel->User_Insert($post);        
        if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
         } 
        $this->response($status, REST_Controller::HTTP_OK);

}

/* For Update */
     
    public function UpdateUser_put($id)
    {
         $data = $this->put();
         $Update = $this->UserModel->User_Update($id,$data);
        if ($Update) {
             $this->response(['Updated successfully.'], REST_Controller::HTTP_OK);
        }
        else{
        $this->response(['Not Updated Successfully'], REST_Controller::HTTP_NOT_FOUND);
        }
    }


/* For Delete */

    public function DeleteUser_delete($id)
    {
        $Delete = $this->UserModel->User_Delete($id);
        if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Select */

    public function SelectUser_get()
    {
        $Select = $this->UserModel->User_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }


/* For Total User */

    public function CountUser_get()
    {
        $Select = $this->UserModel->Count_Users();
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