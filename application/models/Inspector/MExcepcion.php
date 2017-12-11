<?php 

class mExcepcion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getExceptions(){
		    //$query = "SELECT * FROM excepcion";
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('excepcion');
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}

}