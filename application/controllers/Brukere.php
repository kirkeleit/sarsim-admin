<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Brukere extends CI_Controller {
			
		public function index()	{
			redirect('brukere/liste');
		}
	
		public function liste() {
			$this->template->load('standard','brukere/liste');
		}
	
		public function bruker() {
			if ($this->uri->segment(3) != false) {
				$data['BrukerID'] = $this->uri->segment(3);
				$this->template->load('standard','brukere/bruker',$data);
			} else {
				$this->template->load('standard','brukere/bruker');
			}
		}

		public function logginn() {
			$this->load->view('logginn');
		}

		public function roller() {
			$this->template->load('standard','brukere/roller');
		}

		public function rolle() {
			if ($this->uri->segment(3) != false) {
				$data['RolleID'] = $this->uri->segment(3);
				$this->template->load('standard','brukere/rolle',$data);
			} else {
				$this->template->load('standard','brukere/rolle');
			}
		}
	
	}