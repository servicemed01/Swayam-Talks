<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Admin extends CI_Controller {
    
     
   

    public function Index()
  {
      $this->load->view('Index');
  }   

  /* Home Page */

  public function Home()
  {
    $this->load->view('Home');
  } 

  /* Category Page */

  public function Category()
  {
    $this->load->view('Category');
  } 

  /* Location Page */

  public function Location()
  {
    $this->load->view('Location');
  } 
    
  /* Speakers Page */

  public function Speakers()
  {
    $this->load->view('Speakers');
  }  

  /* Show Speaker*/

  public function ShowSpeakers()
  {
    $this->load->view('ShowSpeakers');
  } 

  /* Videos Page */

  public function Videos()
  {
    $this->load->view('Videos');
  } 

  /* Show Videos*/

  public function ShowVideos()
  {
    $this->load->view('ShowVideos');
  } 

  /* Events Page */

  public function Events()
  {
    $this->load->view('Events');
  } 

   /* Show Events*/

  public function ShowEvents()
  {
    $this->load->view('ShowEvents');
  } 

  /* Users Page */

  public function Users()
  {
    $this->load->view('Users');
  } 

  /* Banner Page */

  public function Banner()
  {
    $this->load->view('Banner');
  } 

  /* Feedback Page */

  public function Feedback()
  {
    $this->load->view('Feedback');
  } 

  /* Faq Page */

  public function Faq()
  {
    $this->load->view('Faq');
  } 

  /* Show Faq*/

  public function ShowFaq()
  {
    $this->load->view('ShowFaq');
  } 

  /* Demo Page */

  public function Demo()
  {
    $this->load->view('Demo');
  } 

  /* Sponsor Page */

  public function Sponsor()
  {
    $this->load->view('Sponsor');
  }

  /* Show Sponsor Page */

  public function ShowSponsor()
  {
    $this->load->view('ShowSponsor');
  }

  /* Contact Page */

  public function Contact()
  {
    $this->load->view('Contact');
  }

  /* Gallery Page */

  public function Gallery()
  {
    $this->load->view('Gallery');
  }

  /* Show Gallery Page */

  public function ShowGallery()
  {
    $this->load->view('ShowGallery');
  }

  public function Logout()
  {
     $this->session->sess_destroy();
    redirect('Dashboard/Admin/Index');
  }

  /* Impact Page */

  public function Impact()
  {
    $this->load->view('Impact');
  }

   /* Show Impacts Page */

  public function ShowImpacts()
  {
    $this->load->view('ShowImpacts');
  }

    /* Blog Page */

  public function Blog()
  {
    $this->load->view('Blog');
  }

   /* Show Blogs Page */

  public function ShowBlogs()
  {
    $this->load->view('ShowBlogs');
  }
    
    /* Sponsors Joinus Page */

  public function SponsorsJoinus()
  {
    $this->load->view('SponsorsJoinus');
  }    

   /* Organizer Joinus Page */

  public function OrganizerJoinus()
  {
    $this->load->view('OrganizerJoinus');
  }        

   /* Audiance Joinus Page */

  public function AudianceJoinus()
  {
    $this->load->view('AudianceJoinus');
  }    

   /* Speaker Joinus Page */

  public function SpeakerJoinus()
  {
    $this->load->view('SpeakerJoinus');
  }    
}

?>