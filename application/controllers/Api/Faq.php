<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Faq extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
          }


/* For Insert */

    public function AddFaq_post()
    {
        $status=array();
        $post=$this->post();
        $Add=$this->FaqModel->Faq_Insert($post);        
        if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */
     
    public function DeleteFaq_delete($id)
    {
        $Delete = $this->FaqModel->Faq_Delete($id);
        if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectFaq_get()
    {
        $Select = $this->FaqModel->Faq_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>