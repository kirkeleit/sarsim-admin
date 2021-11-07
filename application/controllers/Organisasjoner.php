<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Organisasjoner extends CI_Controller {
	
		public function index()	{
			redirect('organisasjoner/liste');
		}
	
		public function liste() {
			$this->template->load('standard','organisasjoner/liste');
		}
	
		public function organisasjon() {
			if ($this->uri->segment(3) != false) {
				$data['OrganisasjonID'] = $this->uri->segment(3);
				$this->template->load('standard','organisasjoner/organisasjon',$data);
			} else {
				$this->template->load('standard','organisasjoner/organisasjon');
			}
		}
	
	}