<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Ovelser extends CI_Controller {

	  public function index()	{
		  redirect('ovelser/liste');
	  }
	
	  public function liste()	{
			$this->template->load('standard','ovelser/liste');
	  }

		public function kart()	{
			$this->template->load('standard','ovelser/kart');
	  }
	  
  }