<?php

class mInspeccion_indicacion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->emetro_local = $this->load->database('default',TRUE);
	}
	public function getIndicaciones($idsolicitud){
		$this->emetro_local->SELECT('*');
		$this->emetro_local->FROM('inspeccion_indicacion');
		$this->emetro_local->where('idsolicitud',$idsolicitud);
		$r = $this->emetro_local->get();
		$result = $r->result();
		return $result;

	}
}