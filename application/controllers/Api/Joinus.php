<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Joinus extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
    
    }

/* For Sponsers */

    public function AddSponsersJoinus_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->JoinusModel->SponsersJoinus_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }

  /* For Organizer */

    public function AddOrganizerJoinus_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->JoinusModel->OrganizerJoinus_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }

  /* For Audiance */

    public function AddAudianceJoinus_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->JoinusModel->AudianceJoinus_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }

     /* For Speaker */

    public function AddSpeakerJoinus_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->JoinusModel->SpeakerJoinus_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }


    /* For Select Sponser */

    public function SelectSponsersJoinus_get()
    {
       
        $Select = $this->JoinusModel->SponsersJoinus_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    
    }

    /* For Select Organizer */

    public function SelectOrganizerJoinus_get()
    {
       
        $Select = $this->JoinusModel->OrganizerJoinus_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    
    }

     /* For Select Audiance */

    public function SelectAudianceJoinus_get()
    {
       
        $Select = $this->JoinusModel->AudianceJoinus_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    
    }

    /* For Select Speaker */

    public function SelectSpeakerJoinus_get()
    {
       
        $Select = $this->JoinusModel->SpeakerJoinus_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    
    }
}

?>