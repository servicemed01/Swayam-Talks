<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class History extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       
    }


/* For Insert */

    public function AddHistory_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->HistoryModel->History_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */
 
    public function DeleteHistory_delete($id)
    {
        $Delete = $this->HistoryModel->History_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectHistory_get()
    {
        $Select = $this->HistoryModel->History_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>