<?php

class mActualizar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		// $this->DBCRM = $this->load->database('default', TRUE);
		$this->emetro_local = $this->load->database('default',TRUE);
		$this->emetro_online = $this->load->database('emetro_online',TRUE);
	}
	public function index(){

	}
	public function actualizar(){
		return 12;
	}
}