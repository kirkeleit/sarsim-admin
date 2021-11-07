<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Eposter extends CI_Controller {

	  public function index()	{
		  redirect('eposter/liste');
	  }
	
	  public function liste() {
		  $this->template->load('standard','eposter/liste');
	  }
	
		public function melding() {
			$data['MeldingID'] = $this->uri->segment(3);
			$this->template->load('standard','eposter/melding',$data);
		}
	
	}