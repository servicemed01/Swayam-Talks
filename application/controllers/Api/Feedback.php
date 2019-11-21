<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Feedback extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    }


/* For Insert */

    public function AddFeedback_post()
    {
        $status=array();
        $post=$this->post();
        $Add=$this->FeedbackModel->Feedback_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */
     
    public function DeleteFeedback_delete($id)
    {
        $Delete = $this->FeedbackModel->Feedback_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectFeedback_get()
    {
        $Select = $this->FeedbackModel->Feedback_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>