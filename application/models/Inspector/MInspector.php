<?php 

class mInspector extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getInspector($idInspector)
	{
		$this->emetro_local->select('*');
		$this->emetro_local->FROM('inspector');
		$this->emetro_local->where('idInspector',$idInspector);
		$r = $this->emetro_local->get();
		$result = $r->row();
		return $result;
	}
}