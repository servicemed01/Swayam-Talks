<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Event extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
   
    }
    
/* For Insert */

    public function AddEvent_post()
    {
        $status=array();
        $post=$this->post();
         $post['adminId']=$this->session->userdata('adminId');
         $image_path=$this->ImageUpload("eventImage","Image","/assets/images/events/");
            if($image_path)
            {
              $post["eventImage"]=$image_path;
        $Add=$this->EventModel->Event_Insert($post);        
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


/* For Upadte */
     
    public function UpdateEvent_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $photo = $this->post('eventImage');
         if(strpos($photo, 'http') !== false)
         {
            $data["eventImage"]=$photo;
         }
         else{
          $image_path=$this->ImageUpload("eventImage","Image","/assets/images/events/");
          if($image_path)
            {
              $data["eventImage"]=$image_path;
            }
            else{
              $status["error"]="failed to upload image";
            }
         }
         $Update = $this->EventModel->Event_Update($id,$data);
        if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }

/* For Delete */

    public function DeleteEvent_delete($id)
    {
        $Delete = $this->EventModel->Event_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectEvent_get($id=null)
    {
        if($id!=null)
          $Select = $this->EventModel->Event_Select($id);
        else
          $Select = $this->EventModel->Event_Select();
        $count=0;
        $SelectArray=array();
        foreach($Select as $item){
          $array=array();
          if(strlen($item->speakerId)>0)
          $array=explode(",",$item->speakerId);
          $name=array();
          for($i=0;$i<sizeof($array);$i++)
              array_push($name, array("name"=>$this->EventModel->Get_SpeakerName($array[$i])));
            /* Sponser Name*/
            $sparray=array();
            if(strlen($item->sponserId)>0)
          $sparray=explode(",",$item->sponserId);
          $sponserName=array();
          for($i=0;$i<sizeof($sparray);$i++)
              array_push($sponserName, array("sponserName"=>$this->EventModel->Get_SponserName($sparray[$i])));
            $item->speakerNames=$name;
            $item->sponserName=$sponserName;
            array_push($SelectArray, $item);
          $count++;
        }
        $this->response($SelectArray,REST_Controller::HTTP_OK);
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