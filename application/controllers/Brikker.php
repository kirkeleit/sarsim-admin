<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Brikker extends CI_Controller {

	  public function index()	{
		  redirect('brikker/liste');
	  }
	
	  public function liste() {
		  $this->template->load('standard','brikker/liste');
	  }
	
		public function brikke() {
			$data['BrikkeID'] = $this->uri->segment(3);
			$this->template->load('standard','brikker/brikke',$data);
		}

		public function nyebrikker() {
			$this->template->load('standard','brikker/nyebrikker');
	  }
	
	}