<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Favourate extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       
    }


/* For Insert */

    public function AddFavourate_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->FavourateModel->Favourate_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */
 
    public function DeleteFavourate_delete($id)
    {
        $Delete = $this->FavourateModel->Favourate_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectFavourate_get()
    {
        $Select = $this->FavourateModel->Favourate_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>