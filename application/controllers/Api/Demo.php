<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Demo extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       $this->load->model("DemoApiModel");
    }

    public function Adddata_post()
    {
        $post=$this->post();
        $Add=$this->DemoApiModel->Data_Insert($post);        
        $this->response($Add, REST_Controller::HTTP_OK);
    }
     
    public function Updatedata_put($id)
    {
         $data = $this->put();
         $update = $this->DemoApiModel->Data_Update($id,$data);
         $this->response($update, REST_Controller::HTTP_OK);
    }
    public function Deletedata_delete($id)
    {
        $delete = $this->DemoApiModel->Data_Delete($id);
        $this->response($delete,REST_Controller::HTTP_OK);
    }

    public function Selectdata_get()
    {
        $select = $this->DemoApiModel->Data_Select();
        $this->response($select,REST_Controller::HTTP_OK);
    }
        
}
?>