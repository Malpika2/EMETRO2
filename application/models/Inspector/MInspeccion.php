<?php 

class mInspeccion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getInspeccion($idsolicitud){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('inspeccion');
		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;
	}

}