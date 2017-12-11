<?php 

class mEstados extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getEstados(){
		$this->emetro_local->select('*');
		$this->emetro_local->from('estados');
		$r = $this->emetro_local->get();
		$result  = $r->result();
		return $result;
	}
}