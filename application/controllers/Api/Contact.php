<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Contact extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       
    }


/* For Insert */

    public function AddContact_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->ContactModel->Contact_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */
 
    public function DeleteContact_delete($id)
    {
        $Delete = $this->ContactModel->Contact_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectContact_get()
    {
        $Select = $this->ContactModel->Contact_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>