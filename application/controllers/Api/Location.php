<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Location extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    }


/* For Insert */

    public function AddLocation_post()
    {
        $status=array();
        $post=$this->post();
        $Add=$this->LocationModel->Location_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }

/* For Upadte */
     
    public function UpdateLocation_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $Update = $this->LocationModel->Location_Update($id,$data);
        if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }

/* For Delete */
     
    public function DeleteLocation_delete($id)
    {
        $Delete = $this->LocationModel->Location_Delete($id);
        if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectLocation_get($id=null)
    {
      if($id!=null)
        $Select = $this->LocationModel->Location_Select($id);
      else
         $Select = $this->LocationModel->Location_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>